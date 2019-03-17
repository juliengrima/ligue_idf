<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function homeAdminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('administrator/home_admin.html.twig');
    }

    public function mapAction(Request $request)
    {
        $apiKey = 'AIzaSyAa232Ch8q6OuI0qAkNV4s36dSJKSCaswc';
        $em = $this->getDoctrine()->getManager();
        $map = $em->getRepository('AppBundle:Address')->findAll();
//        $map = $em->getRepository('AppBundle:Address')->findBy( array('slider' => 1) );
        // replace this example code with whatever you need
        return $this->render('default/map.html.twig', array(
            'maps' => $map,
            'key' => $apiKey,
        ));
    }
}
