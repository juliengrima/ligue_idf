<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Address controller.
 *
 */
class AddressController extends Controller
{
    /**
     * Lists all address entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $addresses = $em->getRepository('AppBundle:Address')->findAll();

        return $this->render('address/index.html.twig', array(
            'addresses' => $addresses,
        ));
    }

    /**
     * Creates a new address entity.
     *
     */
    public function newAction(Request $request)
    {
        $address = new Address();
        $form = $this->createForm('AppBundle\Form\AddressType', $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

//            Keep address / postal /city
            $street = $form->getData()->getAddress();
            $postal = $form->getData()->getPostal();
            $city = $form->getData()->getCity();

            $lat_lng = $this->getLatLng($street, $postal, $city);
            if ($lat_lng == 500){
                $this->addFlash(
                    'notice',
                    'Une erreur est survenue lors de l\'enregistrement de l\'adresse, veuillez vérifier'
                );
                return $this->render('address/new.html.twig', array(
                    'form' => $form->createView(),
                    'commercant' => $address,
                ));
            }

            $address->setLat($lat_lng['lat']);
            $address->setLng($lat_lng['lng']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirectToRoute('address_show', array(
                'id' => $address->getId(),
            ));
        }

        return $this->render('address/new.html.twig', array(
            'address' => $address,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a address entity.
     *
     */
    public function showAction(Address $address)
    {
        $apiKey = "AIzaSyDWi3w0hvwNzy1OYnVcRImnDH2bhBFNV8M";
        $deleteForm = $this->createDeleteForm($address);

        return $this->render('address/show.html.twig', array(
            'address' => $address,
            'delete_form' => $deleteForm->createView(),
            'apikey' => $apiKey,
        ));
    }

    /**
     * Displays a form to edit an existing address entity.
     *
     */
    public function editAction(Request $request, Address $address)
    {
        $deleteForm = $this->createDeleteForm($address);
        $editForm = $this->createForm('AppBundle\Form\AddressType', $address);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            //            Keep address / postal /city
            $street = $editForm->getData()->getAddress();
            $postal = $editForm->getData()->getPostal();
            $city = $editForm->getData()->getCity();

            $lat_lng = $this->getLatLng($street, $postal, $city);
            if ($lat_lng == 500){
                $this->addFlash(
                    'notice',
                    'Une erreur est survenue lors de l\'enregistrement de l\'adresse, veuillez vérifier'
                );
                return $this->render('address/new.html.twig', array(
                    'form' => $editForm->createView(),
                    'commercant' => $address,
                ));
            }

            $address->setLat($lat_lng['lat']);
            $address->setLng($lat_lng['lng']);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('address_show', array('id' => $address->getId()));
        }

        return $this->render('address/edit.html.twig', array(
            'address' => $address,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a address entity.
     *
     */
    public function deleteAction(Request $request, Address $address)
    {
        $form = $this->createDeleteForm($address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($address);
            $em->flush();
        }

        return $this->redirectToRoute('address_index');
    }

    /**
     * Creates a form to delete a address entity.
     *
     * @param Address $address The address entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Address $address)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('address_delete', array('id' => $address->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function getLatLng($street, $postal, $city){

        $street = str_replace(" ", "%20", $street);

//        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=". $street . "%20" . $postal . "%20" . $city . "&key=AIzaSyD0M1-1_fcOUWWPgI3L_RXGOJSjZu88oVg";
        $geocode = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $street . "%20" . $postal . "%20" . $city . "&key=AIzaSyD0M1-1_fcOUWWPgI3L_RXGOJSjZu88oVg";

        $result_string = file_get_contents($geocode);

        $result = json_decode($result_string, true);

        if (isset($result['results'][0])){
            $location['lat'] = $result['results'][0]['geometry']['location']['lat'];
            $location['lng'] = $result['results'][0]['geometry']['location']['lng'];

            return $location;
        }
        else
            return $location = 500;
    }
}
