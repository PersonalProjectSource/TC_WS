<?php

namespace TC\TennisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
   /**
     * @Route("{iId}/member/home", name="default")
     * @Template()
     */
    public function indexAction($iId = 4)
    {
        $iId = 4;
        $oEm = $this->getDoctrine()->getManager();
        $oCurrentUser = $oEm->getRepository("TCTennisBundle:User")->find($iId);
        //$iTotal = $this->computeApreciation($iId);
        $iTotal =5;
        return array(
            'entity' => $oCurrentUser,
            'apreciationTotale' => $iTotal);
    }
    
   /**
     * Fait une moyenne de toutes les apréciations utilisateurs d'apres match
     */
    private function computeApreciation($iId) 
    {
        $oEm   = $this->getDoctrine()->getManager();
        $oUser = $oEm->getRepository("TCTennisBundle:User")
                     ->findOneById($iId);
        
        if (!$oUser)
        {
            throw $this->createNotFoundException("L'utilisateur ou token invalide");
        }
        
        $iScore = $oUser->getJugement()->getFairplay() + $oUser->getJugement()->getTechnique() + $oUser->getJugement()->getAmbiance();
        $iScore = $iScore / 3;
        return (int)$iScore;
    }
    
   /**
     * @Route("/member/ajax", name="test_ajax")
     */
    public function traitementTestAjax()
    {
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) 
        {
            /* Response */
            $response = new JsonResponse();
            if ($request->get('name') == "brau") {
  
                $dateUpdated = date("d-m-Y  | H:i:s");
                $response->setData(array(
                   'event_stream_title' => "Laurent :)",
                   'date' => $dateUpdated));
            }
            else {
               $response->setData(array(
                   'event_stream_title' => "toto",
                   ));
            }
            
            return $response;
        }
    }
    
    public function renderTestAction() {
        
        $iId = 1;
        $oEm = $this->getDoctrine()->getManager();
        $oCurrentUser = $oEm->getRepository("TCTennisBundle:User")->find($iId);
        $iTotal = $this->computeApreciation($iId);

        return $this->render("TCTennisBundle:Header:main_header.html.twig", array(
            'entity' => $oCurrentUser,
            'apreciationTotale' => $iTotal));
    }
}
