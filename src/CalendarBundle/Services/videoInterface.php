<?php

namespace CalendarBundle\Services;

use AppBundle\Entity\Videos;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class videoInterface extends Controller
{
	protected $container;

	public function __construct(Container $container) {
		$this->container = $container;

	}

// Uploads a media
	public function videoUpload(Videos $video)
	{
		$file = $video->getFile();
		if ($video->getVideoPath() != null) {	// Si le média contenait déjà un fichier uploadé
			$tmp = explode('/', $video->getVideoPath());
			$filename = end($tmp);    // On récupère le nom du fichier ({{media.picname}}.extension
			// On supprime ce fichier de la mémoire
            if (file_exists ($filename)) {
                unlink ($this->container->getParameter ('videos_directory') . '/' . $filename);
                $video->setVideoPath (null);
            }
		}
		// Puis on upload le nouveau fichier
		$extension = $file->guessExtension();
		$file->move($this->container->getParameter('videos_directory'), $video->getVideoName().'.'.$extension);
		$video->setVideoPath('images/videos/'.$video->getVideoName().'.'.$extension);
	}
}