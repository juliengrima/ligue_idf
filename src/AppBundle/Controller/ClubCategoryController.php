<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ClubCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Clubcategory controller.
 *
 */
class ClubCategoryController extends Controller
{
    /**
     * Lists all clubCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clubCategories = $em->getRepository('AppBundle:ClubCategory')->findAll();

        return $this->render('clubcategory/index.html.twig', array(
            'clubCategories' => $clubCategories,
        ));
    }

    /**
     * Creates a new clubCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $clubCategory = new Clubcategory();
        $form = $this->createForm('AppBundle\Form\ClubCategoryType', $clubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clubCategory);
            $em->flush();

            return $this->redirectToRoute('clubcategory_index', array('id' => $clubCategory->getId()));
        }

        return $this->render('clubcategory/new.html.twig', array(
            'clubCategory' => $clubCategory,
            'form' => $form->createView(),
        ));
    }

//    /**
//     * Finds and displays a clubCategory entity.
//     *
//     */
//    public function showAction(ClubCategory $clubCategory)
//    {
//        $deleteForm = $this->createDeleteForm($clubCategory);
//
//        return $this->render('clubcategory/show.html.twig', array(
//            'clubCategory' => $clubCategory,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }

    /**
     * Displays a form to edit an existing clubCategory entity.
     *
     */
    public function editAction(Request $request, ClubCategory $clubCategory)
    {
        $deleteForm = $this->createDeleteForm($clubCategory);
        $editForm = $this->createForm('AppBundle\Form\ClubCategoryType', $clubCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clubcategory_index', array('id' => $clubCategory->getId()));
        }

        return $this->render('clubcategory/edit.html.twig', array(
            'clubCategory' => $clubCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a clubCategory entity.
     *
     */
    public function deleteAction(Request $request, ClubCategory $clubCategory)
    {
        $form = $this->createDeleteForm($clubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clubCategory);
            $em->flush();
        }

        return $this->redirectToRoute('clubcategory_index');
    }

    /**
     * Creates a form to delete a clubCategory entity.
     *
     * @param ClubCategory $clubCategory The clubCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClubCategory $clubCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clubcategory_delete', array('id' => $clubCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
