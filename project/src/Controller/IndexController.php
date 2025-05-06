<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }
    
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('index/contact.html.twig');
    }
    
    
    #[Route('/apiInfo', name: 'app_apiInfo')]
    public function apiinfo(): Response
    {
        return $this->render('index/apiInfo.html.twig');
    }
    
    
    #[Route('/news', name: 'app_news')]
    public function news(): Response
    {
        return $this->render('index/news.html.twig');
    }
    
    
    
    
}
