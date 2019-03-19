<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
        $clubCategory = $em->getRepository('AppBundle:ClubCategory')->findBy(array('id' => $fullCalendar));
        $address = $em->getRepository('AppBundle:Address')->findBy(array('id' => $fullCalendar));
        $club = $em->getRepository('AppBundle:Clubs')->findBy(array('id' => $clubCategory));
        $category = $em->getRepository('AppBundle:Categories')->findBy(array('id' => $clubCategory));
        $group = $em->getRepository('AppBundle:Groups')->findBy(array('id' => $clubCategory));

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
            return $fullCalendar->getClub1('clubcategory').$fullCalendar->getClub2('clubcategory').$fullCalendar->getAddress('address');
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
        $deleteForm = $this->createDeleteForm($calendar);

        return $this->render('calendar/show.html.twig', array(
            'calendar' => $calendar,
            'delete_form' => $deleteForm->createView(),
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
