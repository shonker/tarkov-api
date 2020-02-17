<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use TarkovAPI\Session\TarkovSession;
use TarkovAPI\Tarkov;

class AccountController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('account/index.html.twig');
    }
    
    /**
     * @Route("/tarkov/login", name="tarkov_account_login")
     */
    public function tarkovAccountLogin(Request $request)
    {
        $email    = $request->get('email');
        $password = $request->get('password');
        $hwid     = $request->get('hwid');
        
        TarkovSession::init();
        
        $api = new Tarkov();
        
    }
}
