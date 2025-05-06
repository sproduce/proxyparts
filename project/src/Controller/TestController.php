<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Repository\Interfaces\PartBrandRepositoryInterface;



class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        echo "Aadsasd";
        return $this->render('base.html.twig');
    }
    
    
    #[Route('/doctrine', name: 'app_doctrine')]
    public function doctrine(PartBrandRepositoryInterface $brandRep)
    {
        echo "Aadsasd";
        $brandObj = $brandRep->getBrandByName("2334test");
        $brandRep->storeBrand($brandObj);
        //return $this->render('base.html.twig');
    }
    
    
    
}
