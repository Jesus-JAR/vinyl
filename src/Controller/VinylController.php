<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

#use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VinylController //extends AbstractController
{
    #[Route('/')]
    public function  index(): Response
    {
        return new Response("Title: PB and Jams");
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if($slug){
            $title ="Titulo: ". u(str_replace("-", " ", $slug))->title(true);
        }
        else{
            $title = "No selecciono ningun tipo de música.";
        }
        return new Response($title);
    }
}
