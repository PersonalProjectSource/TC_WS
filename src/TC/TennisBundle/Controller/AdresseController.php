<?php

namespace TC\TennisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TC\TennisBundle\Entity\Adresse;
use TC\TennisBundle\Entity\Statistic;
use TC\TennisBundle\Entity\Statistique;
use TC\TennisBundle\Entity\User;
use TC\TennisBundle\Form\AdresseType;

/**
 * Adresse controller.
 *
 * @Route("/adresse")
 */
class AdresseController extends Controller
{

    /**
     * Lists all Adresse entities.
     *
     * @Route("/", name="adresse")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {

        // TODO test creation d'une liaison many to many avec attributs.
        // Instanciation et persistance des liaisons.
        $oEm = $this->getDoctrine()->getManager();

        $user = new User();
        $stat = new Statistique();
        $link = new Statistic();
        $user->setNom("usertestMutli");
        $user->setIsAdherent(true);
        $user->setPrenom("prenomCustomLolo");
        $user->setRole("UnroleCustomLolo");

        $stat->setDate("dateCustomLolo");
        $stat->setTitre("TitreCustomlolo");
        $stat->setVisible(true);

        //$user->addStatistiqueUser($stat);
        $link->setUsers($user);
        $link->setStats($stat);

        $link->setDate("dataCustom");
        $oEm->persist($link);
        $oEm->flush();

        die("coucou");



        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TCTennisBundle:Adresse')->findAll();
        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Adresse entity.
     *
     * @Route("/", name="adresse_create")
     * @Method("POST")
     * @Template("TCTennisBundle:Adresse:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Adresse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adresse_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Adresse entity.
     *
     * @param Adresse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Adresse $entity)
    {
        $form = $this->createForm(new AdresseType(), $entity, array(
            'action' => $this->generateUrl('adresse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Adresse entity.
     *
     * @Route("/new", name="adresse_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Adresse();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Adresse entity.
     *
     * @Route("/{id}", name="adresse_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Adresse entity.
     *
     * @Route("/{id}/edit", name="adresse_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
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
    * Creates a form to edit a Adresse entity.
    *
    * @param Adresse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Adresse $entity)
    {
        $form = $this->createForm(new AdresseType(), $entity, array(
            'action' => $this->generateUrl('adresse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Adresse entity.
     *
     * @Route("/{id}", name="adresse_update")
     * @Method("PUT")
     * @Template("TCTennisBundle:Adresse:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TCTennisBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adresse_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Adresse entity.
     *
     * @Route("/{id}", name="adresse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TCTennisBundle:Adresse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Adresse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adresse'));
    }

    /**
     * Creates a form to delete a Adresse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
