<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
     * Creates a new calendar entity.
     *
     */
    public function newAction(Request $request)
    {
        $calendar = new Calendar();
        $form = $this->createForm('AppBundle\Form\CalendarType', $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            return $this->redirectToRoute('calendar_show', array('id' => $calendar->getId()));
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

            return $this->redirectToRoute('calendar_edit', array('id' => $calendar->getId()));
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
