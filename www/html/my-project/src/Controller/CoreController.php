<?php
//src/controller/CoreController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;// param GET/POST/etc...
use Symfony\Component\HttpFoundation\Response;// envoi HTTP
use Symfony\Component\Routing\Annotation\Route;//pour les annotation direct

use App\Form\UserType;
use App\Entity\User;

class CoreController extends AbstractController
{
	/**
	* Page pour s'enregister /register
	*
	*
	* @Route("/register", name="register")
	*/
	public function register()
	{
		
		$user = new User();
		$form_register = $this->createForm(UserType::class, $user);


		return $this->render('register.html.twig', [
			'form_register' => $form_register->createView()]);
	}
}