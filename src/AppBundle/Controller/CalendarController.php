<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

        return $this->render('calendar/index.html.twig', array(
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

        $fullCalendar = $em->getRepository('AppBundle:Calendar')->findAll(); // appel de la table

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
        /* Delet ciclik mapping */
        $normalizer->setCircularReferenceHandler(function ($fullCalendar) {
            return $fullCalendar->getId('club1');
        });

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
            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            return $this->redirectToRoute('fullcalendar_index', array('id' => $calendar->getId()));
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
        $editForm = $this->createForm('AppBundle\Form\CalendarType', $calendar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fullcalendar_index', array('id' => $calendar->getId()));
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
