<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Expense;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class ExpenseController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/expense/add")
     */
    public function createAction(Request $request)
    {
        $name = $request->get('name');
        $amount = $request->get('amount');
        $date = $request->get('date');
        $priority = $request->get('priority');

        if ($request->isMethod('POST') && $this->dataValid()) {
            $date = new \DateTime($date);
            $expense = new Expense();
            $expense->setName($name);
            $expense->setAmount($amount);
            $expense->setDate($date);
            $expense->setPriority($priority);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($expense);
            $em->flush();
        }
        return $this->render('Expense/add.html.twig');
    }

    private function dataValid()
    {
        return true;
    }
}
