<?php

namespace TC\TennisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TC\TennisBundle\Entity\Defi;
use TC\TennisBundle\Form\DefiType;

/**
 * Defi controller.
 *
 * @Route("/defi")
 */
class DefiController extends Controller
{

    /**
     * Lists all Defi entities.
     *
     * @Route("/", name="defi")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TCTennisBundle:Defi')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Defi entity.
     *
     * @Route("/", name="defi_create")
     * @Method("POST")
     * @Template("TCTennisBundle:Defi:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Defi();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('defi_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Defi entity.
     *
     * @param Defi $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Defi $entity)
    {
        $form = $this->createForm(new DefiType(), $entity, array(
            'action' => $this->generateUrl('defi_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Defi entity.
     *
     * @Route("/new", name="defi_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Defi();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Defi entity.
     *
     * @Route("/{id}", name="defi_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Defi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Defi entity.
     *
     * @Route("/{id}/edit", name="defi_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Defi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defi entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Defi entity.
    *
    * @param Defi $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Defi $entity)
    {
        $form = $this->createForm(new DefiType(), $entity, array(
            'action' => $this->generateUrl('defi_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Defi entity.
     *
     * @Route("/{id}", name="defi_update")
     * @Method("PUT")
     * @Template("TCTennisBundle:Defi:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Defi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('defi_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Defi entity.
     *
     * @Route("/{id}", name="defi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TCTennisBundle:Defi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Defi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('defi'));
    }

    /**
     * Creates a form to delete a Defi entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('defi_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
