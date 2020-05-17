<?php

namespace App\Controller;

use App\Entity;
use App\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $employee = new Entity\Employees();
        $formEmployee = $this->createForm(Form\EmployeesType::class, $employee);
        $formEmployee->handleRequest($request);

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form' => $formEmployee->createView()
        ]);
    }
}
