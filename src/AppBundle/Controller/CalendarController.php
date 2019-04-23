<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Calendar controller.
 *
 */
class CalendarController extends Controller
{
    /**
     * Lists all calendar entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $calendars = $em->getRepository('AppBundle:Calendar')->findAll();

        return $this->render('default/calendar.html.twig', array(
            'calendars' => $calendars,
        ));
    }

    /**
     * Get all Events from BDD and convert us to Json Object for Calendar
     *
     */
    public function getEventsJsonObjectAction()
    {
        $em = $this->getDoctrine()->getManager(); //appel doctrine methode BDD

        $fullCalendar = $em->getRepository('AppBundle:Calendar')->getMatches();

        $normalizer = new ObjectNormalizer(); //Normalizer data to encode JSON
        $encoder = new JsonEncoder(); // Encode to JSON

        /* Encode Dates */
        $dateCallback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        /* Creating array for DATE */
        $normalizer->setCallbacks(array('start' => $dateCallback, 'end' => $dateCallback));

        /* Delete ciclik mapping */
//        $normalizer->setCircularReferenceHandler(function ($fullCalendar) {
//            return $fullCalendar->getId('club1');
//        });

        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonObject = $serializer->serialize($fullCalendar, 'json');

        $response = new Response();
        $response->setContent($jsonObject);

        return $response;
    }

    /**
     * Creates a new calendar entity.
     *
     */
    public function newAction(Request $request, $start)
    {
        $calendar = new Calendar();

        if ($start != 0) {
            $calendar->setStart (new \DateTime($start));
//            $calendar->setEnd (new \DateTime($start));
        }

        $form = $this->createForm('AppBundle\Form\CalendarType', $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $select = $calendar->getCategory()->getId();

            if(isset($select)){
                if ($select == 1){

                    $color = "#F0F8FF";

                }
                elseif ($select == 2){

                    $color = "#20B2AA";

                }
                elseif ($select == 3){

                    $color = "#7FFFD4";

                }
                elseif ($select == 4){

                    $color = "#8A2BE2";

                }
                elseif ($select == 5){

                    $color = "#DEB887";

                }
                elseif ($select == 6){

                    $color = "#6495ED";

                }
                elseif ($select == 7){

                    $color = "#DC143C";

                }
                elseif ($select == 7){

                    $color = "#FF1493";

                }
                elseif ($select == 8){

                    $color = "#D8BFD8";

                }
                elseif ($select == 9){

                    $color = "#D2B48C";

                }
                elseif ($select == 10){

                    $color = "#808000";

                }
                elseif ($select == 11){

                    $color = "#FF4500";

                }
                elseif ($select == 12){

                    $color = "#708090";

                }
                elseif ($select == 13){

                    $color = "#F0F8FF";

                }
                elseif ($select == 14){

                    $color = "#CD853F";

                }
                elseif ($select == 15){

                    $color = "#9ACD32";

                }
                elseif ($select == 16){

                    $color = "#9ACD32";

                }
                elseif ($select == 17){

                    $color = "#9ACD32";

                }
                elseif ($select == 18){

                    $color = "#9ACD32";

                }
                elseif ($select == 19){

                    $color = "#9ACD32";

                }
                elseif ($select == 20){

                    $color = "#9ACD32";

                }
                elseif ($select == 21){

                    $color = "#9ACD32";

                }
                elseif ($select == 22){

                    $color = "#9ACD32";

                }
                elseif ($select == 23){

                    $color = "#9ACD32";

                }
                elseif ($select == 24){

                    $color = "#9ACD32";

                }
                elseif ($select == 25){

                    $color = "#9ACD32";

                }
                else{

                    $color = "#0000FF";
                }

            }

            $calendar->setColor($color);

            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            return $this->redirectToRoute('calendar_show', array(
                'id' => $calendar->getId (),
            ));
        }

        return $this->render('calendar/new.html.twig', array(
            'calendar' => $calendar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a calendar entity.
     *
     */
    public function showAction(Calendar $calendar)
    {
        $em = $this->getDoctrine()->getManager(); //appel doctrine methode BDD
        $apiKeyGOGR = "AIzaSyDWi3w0hvwNzy1OYnVcRImnDH2bhBFNV8M";
        $apiKeyJDD = "AIzaSyAa232Ch8q6OuI0qAkNV4s36dSJKSCaswc";

        return $this->render('calendar/show.html.twig', array(
            'calendar' => $calendar,
            'apikey' => $apiKeyJDD
        ));
    }

    /**
     * Displays a form to edit an existing calendar entity.
     *
     */
    public function editAction(Request $request, Calendar $calendar)
    {
        $deleteForm = $this->createDeleteForm($calendar);
        $editForm = $this->createForm('AppBundle\Form\CalendarEditType', $calendar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendar_show', array('id' => $calendar->getId()));
        }

        return $this->render('calendar/edit.html.twig', array(
            'calendar' => $calendar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a calendar entity.
     *
     */
    public function deleteAction(Request $request, Calendar $calendar)
    {
        $form = $this->createDeleteForm($calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($calendar);
            $em->flush();
        }

        return $this->redirectToRoute('calendar_index');
    }

    /**
     * Creates a form to delete a calendar entity.
     *
     * @param Calendar $calendar The calendar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Calendar $calendar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendar_delete', array('id' => $calendar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
