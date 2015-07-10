<?php

namespace TC\TennisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TC\TennisBundle\Entity\Jugement;
use TC\TennisBundle\Form\JugementType;

/**
 * Jugement controller.
 *
 * @Route("/jugement")
 */
class JugementController extends Controller
{

    /**
     * Lists all Jugement entities.
     *
     * @Route("/", name="jugement")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TCTennisBundle:Jugement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Jugement entity.
     *
     * @Route("/", name="jugement_create")
     * @Method("POST")
     * @Template("TCTennisBundle:Jugement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Jugement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jugement_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Jugement entity.
     *
     * @param Jugement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Jugement $entity)
    {
        $form = $this->createForm(new JugementType(), $entity, array(
            'action' => $this->generateUrl('jugement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Jugement entity.
     *
     * @Route("/new", name="jugement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Jugement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Jugement entity.
     *
     * @Route("/{id}", name="jugement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Jugement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Jugement entity.
     *
     * @Route("/{id}/edit", name="jugement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Jugement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugement entity.');
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
    * Creates a form to edit a Jugement entity.
    *
    * @param Jugement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Jugement $entity)
    {
        $form = $this->createForm(new JugementType(), $entity, array(
            'action' => $this->generateUrl('jugement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Jugement entity.
     *
     * @Route("/{id}", name="jugement_update")
     * @Method("PUT")
     * @Template("TCTennisBundle:Jugement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Jugement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('jugement_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Jugement entity.
     *
     * @Route("/{id}", name="jugement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TCTennisBundle:Jugement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jugement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('jugement'));
    }

    /**
     * Creates a form to delete a Jugement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jugement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
