<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CreateSession;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Createsession controller.
 *
 * @Route("createsession")
 */
class CreateSessionController extends Controller
{
    /**
     * Lists all createSession entities.
     *
     * @Route("/", name="createsession_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $createSessions = $em->getRepository('AppBundle:CreateSession')->findAll();

        return $this->render('createsession/index.html.twig', array(
            'createSessions' => $createSessions,
        ));
    }

    /**
     * Creates a new createSession entity.
     *
     * @Route("/new", name="createsession_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $createSession = new Createsession();
        $form = $this->createForm('AppBundle\Form\CreateSessionType', $createSession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($createSession);
            $em->flush();

            return $this->redirectToRoute('createsession_show', array('id' => $createSession->getId()));
        }

        return $this->render('createsession/new.html.twig', array(
            'createSession' => $createSession,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a createSession entity.
     *
     * @Route("/{id}", name="createsession_show")
     * @Method("GET")
     */
    public function showAction(CreateSession $createSession)
    {
        $deleteForm = $this->createDeleteForm($createSession);

        return $this->render('createsession/show.html.twig', array(
            'createSession' => $createSession,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing createSession entity.
     *
     * @Route("/{id}/edit", name="createsession_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CreateSession $createSession)
    {
        $deleteForm = $this->createDeleteForm($createSession);
        $editForm = $this->createForm('AppBundle\Form\CreateSessionType', $createSession);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('createsession_edit', array('id' => $createSession->getId()));
        }

        return $this->render('createsession/edit.html.twig', array(
            'createSession' => $createSession,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a createSession entity.
     *
     * @Route("/{id}", name="createsession_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CreateSession $createSession)
    {
        $form = $this->createDeleteForm($createSession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($createSession);
            $em->flush();
        }

        return $this->redirectToRoute('createsession_index');
    }

    /**
     * Creates a form to delete a createSession entity.
     *
     * @param CreateSession $createSession The createSession entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CreateSession $createSession)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('createsession_delete', array('id' => $createSession->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
