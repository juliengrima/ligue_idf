<?php
/**
 * Created by PhpStorm.
 * User: juliengrima
 * Date: 2019-03-20
 * Time: 17:06
 */

namespace AppBundle\Services;

use AppBundle\Entity\Clubs;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Groups;
use AppBundle\Entity\ClubCategory;
use AppBundle\Entity\Address;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;


class JsonServices extends Controller
{
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;

    }

    public function getjsonMatchs(){

//        Alias 'c' = calendar
//        Alias 'a' = address

        $em = $this->getDoctrine ()->getManager ();
        $repository = $em->getRepository ('AppBundle:Calendar');

        $qb = $repository->createQueryBuilder('c')
            ->select('c.id', 'c.start')
            ->join('c.address', 'a')
            ->addSelect('a.nom', 'a.city', 'a.postal');

        return $qb->getQuery()->getResult();

    }

}