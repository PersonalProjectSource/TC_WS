<?php

namespace TC\TennisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TC\TennisBundle\Entity\FriendList;
use TC\TennisBundle\Form\FriendListType;

/**
 * FriendList controller.
 *
 * @Route("/friendlist")
 */
class FriendListController extends Controller
{

    /**
     * Lists all FriendList entities.
     *
     * @Route("/", name="friendlist")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TCTennisBundle:FriendList')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FriendList entity.
     *
     * @Route("/", name="friendlist_create")
     * @Method("POST")
     * @Template("TCTennisBundle:FriendList:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FriendList();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('friendlist_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a FriendList entity.
     *
     * @param FriendList $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FriendList $entity)
    {
        $form = $this->createForm(new FriendListType(), $entity, array(
            'action' => $this->generateUrl('friendlist_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FriendList entity.
     *
     * @Route("/new", name="friendlist_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FriendList();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FriendList entity.
     *
     * @Route("/{id}", name="friendlist_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:FriendList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FriendList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FriendList entity.
     *
     * @Route("/{id}/edit", name="friendlist_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:FriendList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FriendList entity.');
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
    * Creates a form to edit a FriendList entity.
    *
    * @param FriendList $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FriendList $entity)
    {
        $form = $this->createForm(new FriendListType(), $entity, array(
            'action' => $this->generateUrl('friendlist_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FriendList entity.
     *
     * @Route("/{id}", name="friendlist_update")
     * @Method("PUT")
     * @Template("TCTennisBundle:FriendList:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:FriendList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FriendList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('friendlist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FriendList entity.
     *
     * @Route("/{id}", name="friendlist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TCTennisBundle:FriendList')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FriendList entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('friendlist'));
    }

    /**
     * Creates a form to delete a FriendList entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('friendlist_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
