<?php

namespace IRY\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;

use IRY\AppliBundle\Entity\Pilot;
use IRY\AppliBundle\Form\Type\PilotType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class PilotController extends Controller implements ClassResourceInterface
{
    /**
     * This API method returns the list of all the pilots currently connected
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
		$repo = $em->getRepository('IRYAppliBundle:Pilot');
		$data = $repo->findAll();

		return array("data" => $data);
    }

    /**
     * Get one pilot by giving it's id in parameter.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This API method returns one pilot.",
     * )
     * filters={
     *      {"name"="pilotId", "dataType"="integer"},
     * }
     *
     * @param Pilot $pilot
     * @return array
     * @View()
     */
    public function getAction(Pilot $pilot)
    {
		return $pilot;
    }

    /**
     * Add one pilot
     *
     * @ApiDoc(
     *  description="This API method create one pilot.",
     *  input="IRY\AppliBundle\Form\Type\PilotType",
     *  output="IRY\AppliBundle\Entity\Pilot"
     * )
     *
     * @param Pilot $pilot
     * @return array
     * @View()
     */
    public function postAction()
    {
		return $this->processForm(new Pilot());
    }

     /**
     * Delete a pilot
     *
     * @ApiDoc(
     *  description="This API method deletes a pilot.",
     * )
     *
     * @param Pilot $pilot
     * @return array
     * @View()
     */
    public function deleteAction(Pilot $pilot)
    {
	    $em = $this->getDoctrine()->getManager();
	    $em->remove($pilot);
	    $em->flush();

	    return array("status" => 200);
    }

    private function processForm(Pilot $pilot)
    {
        $form = $this->createForm(new PilotType(), $pilot);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pilot);
            $em->flush();

            return $pilot;
        }

        return array('form' => $form);
    }
}
