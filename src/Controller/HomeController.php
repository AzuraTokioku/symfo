<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig', [
        ]);
    }

/**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {

        dump($_POST);
        dump($request->request->all());
        exit();
        
        $formData = [
            'name' => '',
            'message' => '',
        ];

        return $this->render('home/contact.html.twig', [
            'formData' => $formData,
        ]);
    }
}
