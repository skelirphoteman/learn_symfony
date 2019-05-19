<?php
//src/controller/CoreController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;// param GET/POST/etc...
use Symfony\Component\HttpFoundation\Response;// envoi HTTP
use Symfony\Component\Routing\Annotation\Route;//pour les annotation direct
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Form\UserRegisterType;
use App\Entity\User;

class CoreController extends AbstractController
{


}