<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VinylController extends AbstractController
{
    #[Route('/')]
    public function  index(): Response
    {
        $tracks = [
            ['Song' => 'Gangsta\'s Paradise', 'Artist' => 'Coolio'],
            ['Song' => 'Waterfalls', 'Artist' => 'TLC'],
            ['Song' => 'Creep' , 'Artist' => 'Radiohead'],
            ['Song' => 'Kiss from a Rose', 'Artist' => 'Seal'],
            ['Song' => 'On Bended Knee', 'Artist' => 'Boyz II Men'],
            ['Song' => 'Fantasy', 'Artist' => 'Mariah Carey'],
        ];



        // metodo para llamar a una plantilla 
        return $this->render('vinyl/index.html.twig', [

            'parrafo' => "el titulo de los discos",
            'title' => "PB & Jams", // parametro que se le pasa a la plantilla
            'tracks' => $tracks,
        ]);
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
