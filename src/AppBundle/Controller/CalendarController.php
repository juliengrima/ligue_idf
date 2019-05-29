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

        /* Encode Dates to string */
        $dateCallback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        /* Creating array for DATE */
        $normalizer->setCallbacks(array('start' => $dateCallback)); //, $fullCalendar = 'fc.end' => $dateCallback

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
                    $color = "#607d8b";
                }
                elseif ($select == 2){
                    $color = "#20B2AA";
                }
                elseif ($select == 3 || $select == 4 || $select == 5){
                    $color = "#a1887f";
                }
                elseif ($select == 6 || $select == 7){
                    $color = "#ff5722";
                }
                elseif ($select == 8){
                    $color = "#D8BFD8";
                }
                elseif ($select == 9){
                    $color = "#D2B48C";
                }
                elseif ($select == 10 || $select == 11){
                    $color = "#808000";
                }
                elseif ($select >= 12 && $select <=21){
                    $color = "#708090";
                }
                elseif ($select >= 22 && $select <= 28 ){
                    $color = "#9ccc65";
                }
                elseif ($select >= 29 && $select <= 38 ){
                    $color = "#CD853F";
                }
                elseif ($select == 39 || $select == 40){
                    $color = "#c0ca33";
                }
                elseif ($select >= 41 && $select <= 48){
                    $color = "#4caf50";
                }
                elseif ($select == 49 || $select == 50){
                    $color = "#009688";
                }
                elseif ($select >= 51 && $select <= 53){
                    $color = "#03a9f4";
                }
                elseif ($select >= 54 && $select <= 59){
                    $color = "#2196f3";
                }
                elseif ($select >= 60 && $select <= 62){
                    $color = "#5c6bc0";
                }
                elseif ($select >= 63 && $select <= 68){
                    $color = "#7e57c2";
                }
                elseif ($select >= 69 && $select <= 72){
                    $color = "#d500f9";
                }
                elseif ($select >= 73 && $select <= 79){
                    $color = "#ba68c8";
                }
                elseif ($select == 80){
                    $color = "#f06292";
                }
                elseif ($select == 81){
                    $color = "#e57373";
                }
                elseif ($select == 82){
                    $color = "#1de9b6";
                }
                elseif ($select >= 83 && $select <= 86){
                    $color = "#2979ff";
                }
                elseif ($select == 87){
                    $color = "#651fff";
                }
                elseif ($select == 88){
                    $color = "#64dd17";
                }
                elseif ($select >= 89 && $select <= 96){
                    $color = "#ffd600";
                }
                elseif ($select >= 97 && $select <= 98){
                    $color = "#9e9e9e";
                }
                else{
                    $color = "#00b8d4";
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
