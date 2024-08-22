<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\PartsService;
use App\Form\Type\PartFormType;


class PartsController extends AbstractController
{
    
    private $partsServ;
    
    public function __construct(PartsService $partsServ)
    {
        $this->partsServ = $partsServ;
    }
    
    #[Route('/parts/{brandId}', name: 'app_parts', defaults: ['brandId' => 0])]
    public function partsList($brandId): Response
    {
        if ($brandId){
            $brandObj = $this->partsServ->getPartBrand($brandId);
            $partsObj = $this->partsServ->getParts($brandObj);
            
            return $this->render('parts/parts.html.twig', [
                'partsObj' => $partsObj,
            ]);
        }
        
        return $this->redirectToRoute('app_brands');
        
    }
    
    #[Route('/brands', name: 'app_brands')]
    public function brandsList(): Response
    {
        
        $allBrands = $this->partsServ->getBrands();
        
        return $this->render('parts/brands.html.twig', [
            'brandsObj' => $allBrands,
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
    
    
    #[Route('/offers/{partId}', name: 'app_offers', defaults: ['partId' => 0])]
    public function offersList($partId): Response
    {
        
        $partObj = $this->partsServ->getPartNumber($partId);
        
        
        
        if ($partId){
            return $this->render('parts/offers.html.twig', [
                'offersObj' => $offersObj,
            ]);
        }
        
        return $this->redirectToRoute('app_brands');
    }
    
    
    
    
    
}
