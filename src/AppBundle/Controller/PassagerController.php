<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Passager;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Passager controller.
 *
 * @Route("passager")
 */
class PassagerController extends Controller
{
    /**
     * Lists all passager entities.
     *
     * @Route("/", name="passager_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passagers = $em->getRepository('AppBundle:Passager')->findAll();

        return $this->render('passager/index.html.twig', array(
            'passagers' => $passagers,
        ));
    }

    /**
     * Finds and displays a conducteur events
     *
     * @Route("/event/{id}", name="passager_eventpassager")
     * @Method("GET")
     */
    public function eventAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $passager = $em->getRepository('AppBundle:Passager')->findBy(array('author'=>$user));



        return $this->render('conducteur/eventpassager.html.twig', array('user'=>$user, 'passagers'=>$passagers));
    }

    /**
     * Creates a new passager entity.
     *
     * @Route("/user/new", name="passager_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $passager = new Passager();
        $form = $this->createForm('AppBundle\Form\PassagerType', $passager);
        $form->handleRequest($request);
        $user = $this->getUser();


        if ($form->isSubmitted() && $form->isValid()) {
            $passager->setAuthor($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($passager);
            $em->flush();

            return $this->redirectToRoute('passager_show', array('id' => $passager->getId()));
        }

        return $this->render('passager/new.html.twig', array(
            'passager' => $passager,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passager entity.
     *
     * @Route("/{id}", name="passager_show")
     * @Method("GET")
     */
    public function showAction(Passager $passager)
    {
        $deleteForm = $this->createDeleteForm($passager);

        return $this->render('passager/show.html.twig', array(
            'passager' => $passager,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passager entity.
     *
     * @Route("/{id}/edit", name="passager_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Passager $passager)
    {
        $deleteForm = $this->createDeleteForm($passager);
        $editForm = $this->createForm('AppBundle\Form\PassagerType', $passager);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passager_edit', array('id' => $passager->getId()));
        }

        return $this->render('passager/edit.html.twig', array(
            'passager' => $passager,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passager entity.
     *
     * @Route("/{id}", name="passager_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Passager $passager)
    {
        $form = $this->createDeleteForm($passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passager);
            $em->flush();
        }

        return $this->redirectToRoute('passager_index');
    }

    /**
     * Creates a form to delete a passager entity.
     *
     * @param Passager $passager The passager entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Passager $passager)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('passager_delete', array('id' => $passager->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



}
