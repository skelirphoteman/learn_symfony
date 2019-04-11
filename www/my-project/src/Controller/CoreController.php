<?php
// src/Controller/CoreController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CoreController
{
	/**
	* @Route("/route", name="index")
	*/
	public function index()
	{
		return new Response('Bonjour à tous !');
	}
}