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
//        Alias 'cl' = clubs
//        Alias 'ca' = categories
//        Alias 'cc' = clubcategory
//        Alias 'g' = groups
//        Alias 'a' = address

//        $repository = $this->getDoctrine()
//            ->getRepository('CmsBundle:Artiste');

        $em = $this->getDoctrine ()->getManager ();
        $repository = $em->getRepository ('AppBundle:Calendar');

        $qb = $repository->createQueryBuilder('c')
            ->select('c.id', 'c.start')
            ->join('c.address', 'a')
            ->addSelect('a.nom', 'a.city', 'a.postal');
//            ->join('c.club1', 'cc')
//            ->addSelect('cc.clubId', 'cc.categoryId');
//            ->leftJoin('cc.club', 'cl')
//            ->addSelect('cl.clubName')
//            ->leftJoin('c.club2', 'cl')
//            ->addSelect('cl.clubName')




//            ->select('a.id', 'a.nom')
//            ->Where ('a.archive = false')
//            ->andWhere ('a.commercant1 > 0')
//            ->orWhere ('a.commercant2 > 0')
//            ->orWhere ('a.commercant3 > 0')
//            ->join ('a.categorie', 'ca')
//            ->addSelect('ca.nomDeLaCategorie')
//            ->leftJoin ('a.commercant1', 'co1')
//            ->addSelect ('co1.nom as nomco1', 'co1.adresse as adresseco1',
//                'co1.code as codeco1', 'co1.ville as villeco1', 'co1.lat as latco1', 'co1.lng as lngco1')
//            ->leftJoin ('a.commercant2', 'co2')
//            ->addSelect ('co2.nom as nomco2', 'co2.adresse as adresseco2',
//                'co2.code as codeco2', 'co2.ville as villeco2', 'co2.lat as latco2', 'co2.lng as lngco2')
//            ->leftJoin ('a.commercant3', 'co3')
//            ->addSelect ('co3.nom as nomco3', 'co3.adresse as adresseco3',
//                'co3.code as codeco3', 'co3.ville as villeco3', 'co3.lat as latco3', 'co3.lng as lngco3')
//            ->orderBy ('a.nom');

        return $qb->getQuery()->getResult();

    }

}