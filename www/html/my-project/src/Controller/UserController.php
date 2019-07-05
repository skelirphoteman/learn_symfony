<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;// param GET/POST/etc...
use Symfony\Component\HttpFoundation\Response;// envoi HTTP
use Symfony\Component\Routing\Annotation\Route;//pour les annotation direct
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
	public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
	{
		
		$user = new User();
		$form_register = $this->createForm(UserRegisterType::class, $user);

		$form_register->handleRequest($request);
		if($form_register->isSubmitted() && $form_register->isValid()){
			$user = $form_register->getData();

			$password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
			
			$user->setPassword($password);

			$user->setIsActive(true);
            $user->addRole('ROLE_USER');
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();
		}

		return $this->render('user/register.html.twig', [
			'form_register' => $form_register->createView()]);
	}



	 /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        //
        $form = $this->get('form.factory')
                ->createNamedBuilder(null)
                ->add('_username', null, ['label' => 'Email'])
                ->add('_password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class, ['label' => 'Mot de passe'])
                ->add('ok', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, ['label' => 'Ok', 'attr' => ['class' => 'btn-primary btn-block']])
                ->getForm();

                
        return $this->render('user/login.html.twig', [
                    'mainNavLogin' => true, 'title' => 'Connexion',
                    //
                    'form' => $form->createView(),
                    'last_username' => $lastUsername,
                    'error' => $error,
        ]);
    }


     /**
     * @Route("/admin")
     */
    public function admin() {
        return new Response('bonjour admin');
    }

     /**
     * @Route("/profile")
     */
    public function profile() {
        $user = $this->getUser();
        return new Response('bonjour ' . $user->getName());
    }


}
