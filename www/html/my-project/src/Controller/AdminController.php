<?php

//src/Controller/AdminController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
*	@Route("/admin", name="admin")
*/
class AdminController extends AbstractController
{
	/**
     * @Route("/admin")
     */
    public function admin() {
        return new Response('bonjour admin');
    }

}