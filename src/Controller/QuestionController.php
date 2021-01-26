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



class QuestionController extends AbstractController
{
    #[Route('/question/{id}', name: 'question')]
    public function index($id): Response
    {   
        $question=$this->getDoctrine()->getRepository(Question::class)->find($id);
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new 
        JsonEncoder()));
        $json = $serializer->serialize($question, 'json', [
            'circular_reference_handler' => function ($json) {
        
                return $json->getId();

            }]);
            return new Response($json);
    }
           
}
