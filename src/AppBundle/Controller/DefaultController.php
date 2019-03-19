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
        $ip = $this->get_ip_address();

//        $map = $em->getRepository('AppBundle:Address')->findBy( array('slider' => 1) );
        // replace this example code with whatever you need
        return $this->render('default/map.html.twig', array(
            'maps' => $map,
            'key' => $apiKey,
            'ip' => $ip,
        ));
    }

    public function fullCalendarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $map = $em->getRepository('AppBundle:Address')->findAll();


//        $map = $em->getRepository('AppBundle:Address')->findBy( array('slider' => 1) );
        // replace this example code with whatever you need
        return $this->render('calendar/calendar.html.twig', array(
            'maps' => $map,
        ));
    }

    /**
     * Get current user IP Address.
     * @return string
     */
    function get_ip_address() {
        if ( isset( $_SERVER['HTTP_X_REAL_IP'] ) ) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
            return $ip;
        } elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            // Proxy servers can send through this header like this: X-Forwarded-For: client1, proxy1, proxy2
            // Make sure we always only send through the first IP in the list which should always be the client IP.
            return (string) self::is_ip_address( trim( current( explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) );
        } elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return '';
    }

}
