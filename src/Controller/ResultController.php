<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use App\Entity\Question;
use App\Entity\Proposal;
use App\Entity\Result;


class ResultController extends AbstractController
{
    #[Route('/result/{id}', name: 'result')]
    public function result($id): Response
 {
      try {
        $result=$this->getDoctrine()->getRepository(Result::class)->find($id);
        $serializer = new Serializer(array(new GetSetMethodNormalizer()),array('json'=>new JsonEncoder()));
        $json = $serializer->serialize($result, 'json', 
        );
     
     return new Response($json);
       
       
    } catch (Exception $e){
        echo $e->getMessage();
    }
}
}
