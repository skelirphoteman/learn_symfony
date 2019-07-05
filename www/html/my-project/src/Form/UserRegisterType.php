<?php

// src/Form/UserRegisterType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;
/**
 * 
 */
class UserRegisterType extends AbstractType
{
	
	public function buildForm(FormBuilderInterface $builder, array$options)
	{
		$builder
			->add('name', 
				TextType::class, 
				['label' => 'your.name',
				'attr' => ['class' => 'form-control']])
			->add('surname', 
				TextType::class,
				['label' => 'your.surname',
				'attr' => ['class' => 'form-control']])
			->add('email', EmailType::class,
				['label' => "your.email",
				'attr' => ['class' => 'form-control']])
			->add('plainPassword', RepeatedType::class,[
				'type' => PasswordType::class,
				'invalid_message' => 'password.fail',
				'required' => true,
				'attr' => ['class' => 'form-row'],
				'options' => ['attr' => ['class' => 'form-group col-md-6']],
				'first_options' => 
					["label" => "your.password",
					'attr' => ['class' => 'form-control']],
				'second_options' => 
					["label" => "repeat.your.password",
					'attr' => ['class' => 'form-control']]])
			->add('save', SubmitType::class, [
				'label' => 'register.user',
				'attr' => ['class' => 'btn btn-primary']]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class'		=> User::class,
			'csrf_protection'	=> false
		]);
	}
}