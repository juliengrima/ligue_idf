<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Groups;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Group controller.
 *
 */
class GroupsController extends Controller
{
    /**
     * Lists all group entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groups = $em->getRepository('AppBundle:Groups')->findAll();

        return $this->render('groups/index.html.twig', array(
            'groups' => $groups,
        ));
    }

    /**
     * Creates a new group entity.
     *
     */
    public function newAction(Request $request)
    {
        $group = new Group();
        $form = $this->createForm('AppBundle\Form\GroupsType', $group);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirectToRoute('groups_show', array('id' => $group->getId()));
        }

        return $this->render('groups/new.html.twig', array(
            'group' => $group,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a group entity.
     *
     */
    public function showAction(Groups $group)
    {
        $deleteForm = $this->createDeleteForm($group);

        return $this->render('groups/show.html.twig', array(
            'group' => $group,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing group entity.
     *
     */
    public function editAction(Request $request, Groups $group)
    {
        $deleteForm = $this->createDeleteForm($group);
        $editForm = $this->createForm('AppBundle\Form\GroupsType', $group);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groups_edit', array('id' => $group->getId()));
        }

        return $this->render('groups/edit.html.twig', array(
            'group' => $group,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a group entity.
     *
     */
    public function deleteAction(Request $request, Groups $group)
    {
        $form = $this->createDeleteForm($group);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($group);
            $em->flush();
        }

        return $this->redirectToRoute('groups_index');
    }

    /**
     * Creates a form to delete a group entity.
     *
     * @param Groups $group The group entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Groups $group)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groups_delete', array('id' => $group->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
