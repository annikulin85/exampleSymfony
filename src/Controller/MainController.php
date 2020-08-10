<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Form\EmployeesType;
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
        $em = $this->getDoctrine()->getManager();

        $employee = new Employees();
        $formEmployee = $this->createForm(EmployeesType::class, $employee);
        $formEmployee->handleRequest($request);

        if ($formEmployee->isSubmitted() && $formEmployee->isValid()) {
            //$data = $formEmployee->getData();

            $em->persist($employee);
            $em->flush();

            return $this->redirectToRoute("index");
        }

        $employees = $em->getRepository(Employees::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form' => $formEmployee->createView(),
            'employees' => $employees
        ]);
    }

    /**
     * @Route("/remove/{employee}", name="remove_employee")
     * @param Employees $employee
     * @param Request $request
     * @return Response
     */
    public function removeEmployee(Employees $employee, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($employee);
        $em->flush();

        return $this->redirectToRoute("index");
    }
}
