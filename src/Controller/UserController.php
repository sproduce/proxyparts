<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\SecurityBundle\Security;
use App\Form\Type\PartsOfferFormType;
use App\Service\PartsService;


class UserController extends AbstractController
{
    private $userObj;
    private $partsServ;
    public function __construct(Security $security, PartsService $partsServ)
    {
        $this->userObj = $security->getUser();
        $this->partsServ = $partsServ;
    }
    
    
    
    
    #[Route('/user/offers', name: 'app_user_offers')]
    public function listOffers(): Response
    {
        $partsOffers = $this->partsServ->getUserOffers($this->userObj);
        
        return $this->render('user/parts.html.twig',[
            'partsOffers' => $partsOffers,
        ]);
    }
    
    
    
    
    #[Route('/user/addOffer/{id}', methods: ['GET'] , name: 'app_user_add_offer', defaults: ['id' => 0])]
    public function addPartsOffer(int $id , PartsService $partsServ): Response
    {
        $partsOffer = $partsServ->getUserOffer($this->userObj, $id);
        //$offerPropertys = $partsServ->getOfferPropertys();
        $formOptions = ['action' => $this->generateUrl('app_user_store_offer')];
        
        
        
        if ($partsOffer->getId()) {
            $formOptions += ['save' => 'Save'];
        }
        
                
        $offerObj = $this->createForm(PartsOfferFormType::class, $partsOffer, $formOptions);
        //var_dump($offerObj);
        
        return $this->render('user/addOffer.html.twig',[
            'offerObj' => $offerObj,
        ]);
    }
    
    
    #[Route('/user/addOffer', methods: ['POST'] , name: 'app_user_store_offer')]
    public function storePartsOffer(PartsService $partsServ ,Request $request): Response
    {
        $partsOffer = $partsServ->getUserOffer($this->userObj);
        $form = $this->createForm(PartsOfferFormType::class, $partsOffer);
        
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($partsOffer->getId()){
                $this->addFlash('success', 'Запчасть Сохранена');
            } else {
                $this->addFlash('success', 'Запчасть Добавлена');
            }
            var_dump($partsOffer);
            $partsServ->storeUserOffer($partsOffer, $this->userObj);
            
            return $this->redirectToRoute('app_user_offers');
        } 
         
        return $this->redirectToRoute('/');
    }
    
    
    
    
    
    
    
    
    
    
    #[Route('/user/profile', name: 'app_user_profile')]
    public function profile(): Response
    {
        return $this->render('index/index.html.twig');
    }
    
    
    
    
}
