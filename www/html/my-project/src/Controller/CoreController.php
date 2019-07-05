<?php
//src/controller/CoreController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;// param GET/POST/etc...
use Symfony\Component\HttpFoundation\Response;// envoi HTTP
use Symfony\Component\Routing\Annotation\Route;//pour les annotation direct
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class CoreController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */
	public function home(Request $request){
		return $this->render('core/home.html.twig');	
	}
}