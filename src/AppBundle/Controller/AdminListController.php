<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminListController extends Controller
{
    /**
     * 
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/admin/list/{entityName}", name="entity_list")
     */
    public function listAction($entityName)
    {
        $entities = $this->get('app.entity_list_mapper')->getEntitiesForList($entityName);
        $listProperties = $this->get('app.entity_list_mapper')->getPropertiesForList($entityName);
        return $this->render('pages/table-list.html.twig', array('title' => $entityName,'properties'=>$listProperties,'entities'=>$entities));
    }

    /**
     * @param $entityName
     * @param $entityId
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/admin/edit/{entityName}/{entityId}",name="entity_edit")
     */
    public function editAction($entityName,$entityId,Request $request){
        $entity = $this->get('app.entity_list_mapper')->getEntity($entityName,$entityId);
        $formTypeClass= $this->get('app.entity_list_mapper')->getFormClass($entityName);
        
        $form = $this->createForm($formTypeClass,$entity);
        if ($form->handleRequest($request)->isValid()){
            
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($entity);
            $em->flush();
            
            $this->get('app.toaster')->addSuccess('Edtition réussie');
            return $this->redirectToRoute('entity_list',['entityName'=>$entityName]);
        }
        else if ($form->isSubmitted()){
            $this->get('app.toaster')->addSuccess('Edtition réussie');
        }
        
        return $this->render('pages/simple-form.html.twig',['form'=>$form->createView(),'title'=>'Edit '.$entityName]);
        
    }
}