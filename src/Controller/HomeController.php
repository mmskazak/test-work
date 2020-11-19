<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ClientRepository $clientRepository): Response
    {

        $clients = $clientRepository->getFullInformationByClient();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'clients' => $clients
        ]);
    }
}
