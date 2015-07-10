<?php

namespace TC\TennisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TC\TennisBundle\Entity\NewsStream;
use TC\TennisBundle\Form\NewsStreamType;

/**
 * NewsStream controller.
 *
 * @Route("/newsstream")
 */
class NewsStreamController extends Controller
{

    /**
     * Lists all NewsStream entities.
     *
     * @Route("/", name="newsstream")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TCTennisBundle:NewsStream')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new NewsStream entity.
     *
     * @Route("/", name="newsstream_create")
     * @Method("POST")
     * @Template("TCTennisBundle:NewsStream:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new NewsStream();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newsstream_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a NewsStream entity.
     *
     * @param NewsStream $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NewsStream $entity)
    {
        $form = $this->createForm(new NewsStreamType(), $entity, array(
            'action' => $this->generateUrl('newsstream_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NewsStream entity.
     *
     * @Route("/new", name="newsstream_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new NewsStream();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a NewsStream entity.
     *
     * @Route("/{id}", name="newsstream_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:NewsStream')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsStream entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing NewsStream entity.
     *
     * @Route("/{id}/edit", name="newsstream_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:NewsStream')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsStream entity.');
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
    * Creates a form to edit a NewsStream entity.
    *
    * @param NewsStream $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NewsStream $entity)
    {
        $form = $this->createForm(new NewsStreamType(), $entity, array(
            'action' => $this->generateUrl('newsstream_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NewsStream entity.
     *
     * @Route("/{id}", name="newsstream_update")
     * @Method("PUT")
     * @Template("TCTennisBundle:NewsStream:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:NewsStream')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsStream entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newsstream_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a NewsStream entity.
     *
     * @Route("/{id}", name="newsstream_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TCTennisBundle:NewsStream')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NewsStream entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newsstream'));
    }

    /**
     * Creates a form to delete a NewsStream entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsstream_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
