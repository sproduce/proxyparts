<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\PartsService;
use App\Form\Type\BrandFormType;
use App\Form\Type\PartFormType;


class PartsController extends AbstractController
{
    #[Route('/parts', name: 'app_parts')]
    public function partsList(PartsService $partsServ ): Response
    {
        
        $partsServ->getPartBrand(10);
        
        return $this->render('parts/index.html.twig', [
            'controller_name' => 'PartsController',
        ]);
    }
    
    #[Route('/brands', name: 'app_brands')]
    public function brandsList(PartsService $partsServ ): Response
    {
        
        $partsServ->getPartBrand(10);
        
        return $this->render('parts/index.html.twig', [
            'controller_name' => 'PartsController',
        ]);
    }
    
    
    #[Route('/addBrand', name: 'app_add_brand')]
    public function addBrand(PartsService $partsServ ,Request $request): Response
    {
        $partBrand = $partsServ->getPartBrand(5);
       
        $form = $this->createForm(BrandFormType::class, $partBrand);
        
        $form->handleRequest($request);
        
         
         
        return $this->render('parts/addBrand.html.twig',[
            'form' => $form,
        ]);
    }
    
    
    
    #[Route('/addPart', name: 'app_add_part')]
    public function addPart(PartsService $partsServ, Request $request): Response
    {
        $partNumber = $partsServ->getPartNumber(1);
        //$partNumber->getPartBrand()->setName("test1");
        $form = $this->createForm(PartFormType::class, $partNumber, [
            'action' => $this->generateUrl('app_add_part'),
            'method' => 'POST',
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //var_dump($partNumber);
            $partsServ->storePartNumber($partNumber);
            
        }
        
        
        return $this->render('parts/addPart.html.twig',[
            'form' => $form,
        ]);
    }
    
    
    
    
    
}
