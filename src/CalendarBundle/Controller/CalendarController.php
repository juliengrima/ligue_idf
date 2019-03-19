<?php

namespace CalendarBundle\Controller;

use CalendarBundle\Entity\Agenda;
use AppBundle\Entity\Media;
use CalendarBundle\Form\AgendaType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Agenda controller.
 *
 */
class CalendarController extends Controller
{

    /**
     * Render Calendar View for Users
     *
     */
    public function calendar_indexAction()
    {
        return $this->render('@Calendar/fullcalendar/views/agenda-fullviews.html.twig');
    }

    /**
     * Get all Events from BDD and convert us to Json Object for Calendar
     *
     */
    public function getEventsJsonObjectAction()
    {
        $em = $this->getDoctrine()->getManager(); //appel doctrine methode BDD

        $agenda = $em->getRepository('CalendarBundle:Agenda')->findAll(); // appel de la table
        $clubCategory = $em->getRepository('AppBundle:ClubCategory')->findBy(array('id' => $agenda));
        $address = $em->getRepository('AppBundle:Address')->findBy(array('id' => $agenda));
        $club = $em->getRepository('AppBundle:Clubs')->findBy(array('id' => $clubCategory));
        $category = $em->getRepository('AppBundle:Categories')->findBy(array('id' => $clubCategory));
        $group = $em->getRepository('AppBundle:Groups')->findBy(array('id' => $clubCategory));

        $normalizer = new ObjectNormalizer(); //Normalisation des données pour passer en JSON

        $encoder = new JsonEncoder(); // Encodage des données en JSON

        /* ENCODAGE DE DATE POUR RECUP */
        $dateCallback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        /* CREATION TABLEAU POUR ENVOI AU JSON */
        $normalizer->setCallbacks(array('start' => $dateCallback, 'end' => $dateCallback));
        /* SUPPRESSION D'UN APPEL DE L'ENTITE POUR LE TABLEAU */
        $normalizer->setCircularReferenceHandler(function ($agenda) {
            return $agenda->getPicname('media');
        });

        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonObject = $serializer->serialize($agenda, 'json');

        $response = new Response();
        $response->setContent($jsonObject);

        return $response;
    }

    /**
     * Creates a new agenda entity.
     *
     */
    public function newAction(Request $request, $start)
    {
        $agenda = new Agenda();

        if ($start != 0) {
            $agenda->setStart (new \DateTime($start));
            $agenda->setEnd (new \DateTime($start));
        }

        $form = $this->createForm ('CalendarBundle\Form\AgendaType', $agenda);

        $form->setData ($agenda);

        $form->handleRequest ($request);

        if ($form->isSubmitted () && $form->isValid ()) {

//            /* ON RECUP LE FICHIER IMAGE */
//            $imageForm = $form->get ('media');
//            $image = $imageForm->getData ();
//            $agenda->setMedia ($image);
//
//            if (isset($image)) {
//
//                /* ON DEFINI UN NOM UNIQUE AU FICHIER UPLOAD : LE PREG_REPLACE PERMET LA SUPPRESSION DES ESPACES ET AUTRES CARACTERES INDESIRABLES*/
//                $image->setPicname (preg_replace ('/\W/', '_', "Event_" . $agenda->getTitre () . uniqid ()));
//                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
//                $this->get ('media.interface')->mediaUpload ($image);
//
//            }

            /* SI L'HEURE ET/OU LA DATE DE FIN EST INFERIEUR A CELLE DE DEBUT ON REVIENT A LA PAGE NEW*/

//            if ($agenda->getStart () > $agenda->getEnd ()) {
//                $this->addFlash (
//                    'success',
//                    'Attention la date de fin est antérieur à la date de début'
//                );
//
//                return $this->render ('@Calendar/agenda/new.html.twig', array (
//                    'agenda' => $agenda,
//                    'form' => $form->createView (),
//                ));
//            } else {

                $em = $this->getDoctrine ()->getManager ();
                $em->persist ($agenda);
                $em->flush ();
                return $this->redirectToRoute ('agenda_show_all', array ('id' => $agenda->getId ()));
//            }
        }

        return $this->render('@Calendar/agenda/new.html.twig', array(
            'agenda' => $agenda,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agenda entity.
     *
     */
    public function showAction(Agenda $agenda)
    {

        return $this->render('@Calendar/agenda/show.html.twig', array(
            'agenda' => $agenda,
        ));
    }

    /**
     * Finds and displays a agenda entity.
     *
     */
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $agenda = $em->getRepository('CalendarBundle:Agenda')->findall();

        return $this->render('@Calendar/fullcalendar/views/agenda-fullviews.html.twig', array(
            'events' => $agenda,
        ));
    }

    /**
     * Displays a form to edit an existing agenda entity.
     *
     */
    public function editAction(Request $request, Agenda $agenda)
    {
        $editForm = $this->createForm('CalendarBundle\Form\AgendaType', $agenda);

        $editForm->setData($agenda);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

//            /* ON RECUP LE FICHIER IMAGE */
//            $imageForm = $editForm->get('media');
//            $image = $imageForm->getData();
//            $agenda->setMedia($image);
//
//            if (isset($image)) {
//
//                /* ON DEFINI UN NOM UNIQUE AU FICHIER UPLOAD : LE PREG_REPLACE PERMET LA SUPPRESSION DES ESPACES ET AUTRES CARACTERES INDESIRABLES*/
//                $image->setPicname (preg_replace ('/\W/', '_', "Event_" . $agenda->getTitre () . uniqid ()));
//                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
//                $this->get ('media.interface')->mediaUpload ($image);
//
//            }
//
//            if($agenda->getStart() > $agenda->getEnd()) {
//                $this->addFlash (
//                    'success',
//                    'Attention la date de fin est antérieur à la date de début'
//                );
//
//                return $this->render('@Calendar/agenda/edit.html.twig', array(
//                    'agenda' => $agenda,
//                    'edit_form' => $editForm->createView(),
//                ));
//            }
//            else{
                $em = $this->getDoctrine()->getManager();
                $em->persist($agenda);
                $em->flush();


                return $this->redirectToRoute('agenda_show_all', array('id' => $agenda->getId()));
//            }
        }

        return $this->render('@Calendar/agenda/edit.html.twig', array(
            'agenda' => $agenda,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a agenda entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $agenda = $em->getRepository('CalendarBundle:Agenda')->findOneById($id);

        if (!empty($agenda))
        {
            $em->remove($agenda);
            $em->flush();
        }

        return $this->redirectToRoute('agenda_show_all');
    }

}
