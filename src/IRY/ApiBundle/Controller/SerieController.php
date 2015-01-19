<?php

namespace IRY\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;

use IRY\AppliBundle\Entity\Serie;
use IRY\AppliBundle\Form\Type\SerieType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class SerieController extends Controller implements ClassResourceInterface
{
    /**
     * This API method returns the list of all the Series currently connected
     *
     * @ApiDoc(
     *  resource=true,
     * )
     *
     * @return array
     * @View()
     */
    public function cgetAction()
    {
		$em = $this->getDoctrine()->getManager();
		$repo = $em->getRepository('IRYAppliBundle:Serie');
		$data = $repo->findAll();

		return $data;
    }

    /**
     * Get one Serie by giving it's id in parameter.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This API method returns one Serie.",
     * )
     * filters={
     *      {"name"="SerieId", "dataType"="integer"},
     * }
     *
     * @param Serie $Serie
     * @return array
     * @View()
     */
    public function getAction(Serie $serie)
    {
		return $serie;
    }

    /**
     * Add one Serie
     *
     * @ApiDoc(
     *  description="This API method create one Serie.",
     *  input="IRY\AppliBundle\Form\Type\SerieType",
     *  output="IRY\AppliBundle\Entity\Serie"
     * )
     *
     * @param Serie $serie
     * @return array
     * @View()
     */
    public function postAction()
    {
		return $this->processForm(new Serie());
    }

     /**
     * Delete a Serie
     *
     * @ApiDoc(
     *  description="This API method deletes a Serie.",
     * )
     *
     * @param Serie $serie
     * @return array
     * @View()
     */
    public function deleteAction(Serie $serie)
    {
	    $em = $this->getDoctrine()->getManager();
	    $em->remove($serie);
	    $em->flush();

	    return array("status" => 200);
    }

    private function processForm(Serie $serie)
    {
        $form = $this->createForm(new SerieType(), $serie);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return $serie;
        }

        return array('form' => $form);
    }
}
