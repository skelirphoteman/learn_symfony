<?php

// src/Form/UserType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

/**
 * 
 */
class UserType extends AbstractType
{
	
	public function buildForm(FormBuilderInterface $builder, array$options)
	{
		$builder
			->add('name', 
				TextType::class, 
				['label' => 'your.name'])
			->add('surname', 
				TextType::class,
				['label' => 'your.surname'])
			->add('email', EmailType::class,
				['label' => "your.email"])
			->add('password', RepeatedType::class,[
				'type' => PasswordType::class,
				'invalid_message' => 'password.fail',
				'required' => true,
				'first_options' => 
					["label" => "your.password"],
				'second_options' => 
					["label" => "repeat.your.password"]])
			->add('save', SubmitType::class, ['label' => 'register.user']);
	}
}