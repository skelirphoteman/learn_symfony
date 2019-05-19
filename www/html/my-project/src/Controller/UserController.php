<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;// param GET/POST/etc...
use Symfony\Component\HttpFoundation\Response;// envoi HTTP
use Symfony\Component\Routing\Annotation\Route;//pour les annotation direct
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Form\UserRegisterType;
use App\Entity\User;

class UserController extends AbstractController
{
	/**
	* Page pour s'enregister /register
	*
	*
	* @Route("/register", name="register")
	*/
	public function register(Request $request): Response
	{
		
		$user = new User();
		$form_register = $this->createForm(UserRegisterType::class, $user);

		$form_register->handleRequest($request);
		if($form_register->isSubmitted() && $form_register->isValid()){
			$user = $form_register->getData();
			
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();
		}

		return $this->render('user/register.html.twig', [
			'form_register' => $form_register->createView()]);
	}
}
