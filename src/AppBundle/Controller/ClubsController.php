<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Clubs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Club controller.
 *
 */
class ClubsController extends Controller
{
    /**
     * Lists all club entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clubs = $em->getRepository('AppBundle:Clubs')->findAll();

        return $this->render('clubs/index.html.twig', array(
            'clubs' => $clubs,
        ));
    }

    /**
     * Creates a new club entity.
     *
     */
    public function newAction(Request $request)
    {
        $club = new Clubs();
        $form = $this->createForm('AppBundle\Form\ClubsType', $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('clubs_index', array('id' => $club->getId()));
        }

        return $this->render('clubs/new.html.twig', array(
            'club' => $club,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a club entity.
     *
     */
    public function showAction(Clubs $club)
    {
        $deleteForm = $this->createDeleteForm($club);

        return $this->render('clubs/show.html.twig', array(
            'club' => $club,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing club entity.
     *
     */
    public function editAction(Request $request, Clubs $club)
    {
        $deleteForm = $this->createDeleteForm($club);
        $editForm = $this->createForm('AppBundle\Form\ClubsEditType', $club);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clubs_index', array('id' => $club->getId()));
        }

        return $this->render('clubs/edit.html.twig', array(
            'club' => $club,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a club entity.
     *
     */
    public function deleteAction(Request $request, Clubs $club)
    {
        $form = $this->createDeleteForm($club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($club);
            $em->flush();
        }

        return $this->redirectToRoute('clubs_index');
    }

    /**
     * Creates a form to delete a club entity.
     *
     * @param Clubs $club The club entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clubs $club)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clubs_delete', array('id' => $club->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
