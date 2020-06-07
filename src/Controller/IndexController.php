<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(NewsRepository $repoNews)
    {
        $news = new News(); // on appel l'entité 
        $news = $repoNews->findBy(array(), array('id' => 'ASC'), 8); // On demande de nous retouner les 8 derniére résultat


        return $this->render('index/index.html.twig', [
            'news' => $news,
        ]);
    }
}
