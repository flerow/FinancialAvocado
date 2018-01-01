<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/categorie/add")
     */
    public function createAction(Request $request)
    {
        $name = $request->get('name');
        if ($request->isMethod('POST') && $this->dataValid()) {
            $categorie = new Categorie();
            $categorie->setName($name);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($categorie);
            $em->flush();
        }
        return $this->render('Categorie/add.html.twig');
    }

    private function dataValid()
    {
        return true;
    }

}
