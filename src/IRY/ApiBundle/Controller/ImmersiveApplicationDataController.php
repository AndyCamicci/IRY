<?php

namespace IRY\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;

use IRY\AppliBundle\Entity\ImmersiveApplicationData;
use IRY\AppliBundle\Form\Type\ImmersiveApplicationDataType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ImmersiveApplicationDataController extends Controller implements ClassResourceInterface
{
    /**
     * This API method returns the list of all the immersive data
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
		$repo = $em->getRepository('IRYAppliBundle:ImmersiveApplicationData');
		$data = $repo->findAll();

		return $data;
    }

    /**
     * Get one immersive data by giving it's id in parameter.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This API method returns one immersive application data.",
     * )
     * filters={
     *      {"name"="immersiveApplicationDataId", "dataType"="integer"},
     * }
     *
     * @param ImmersiveApplicationData $immersiveApplicationData
     * @return array
     * @View()
     */
    public function getAction(ImmersiveApplicationData $immersiveApplicationData)
    {
		return $immersiveApplicationData;
    }

    /**
     * Add one immersive data
     *
     * @ApiDoc(
     *  description="This API method create one immersiveApplicationData.",
     *  input="IRY\AppliBundle\Form\Type\ImmersiveApplicationDataType",
     *  output="IRY\AppliBundle\Entity\ImmersiveApplicationData"
     * )
     *
     * @param ImmersiveApplicationData $immersiveApplicationData
     * @return array
     * @View()
     */
    public function postAction()
    {
		return $this->processForm(new ImmersiveApplicationData());
    }

     /**
     * Delete a immersive app
     *
     * @ApiDoc(
     *  description="This API method deletes a immersive app.",
     * )
     *
     * @param ImmersiveApplicationData $immersiveApplicationData
     * @return array
     * @View()
     */
    public function deleteAction(ImmersiveApplicationData $immersiveApplicationData)
    {
	    $em = $this->getDoctrine()->getManager();
	    $em->remove($immersiveApplicationData);
	    $em->flush();

	    return array("status" => 200);
    }

    private function processForm(ImmersiveApplicationData $immersiveApplicationData)
    {
        $form = $this->createForm(new ImmersiveApplicationDataType(), $immersiveApplicationData);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($immersiveApplicationData);
            $em->flush();

            return $immersiveApplicationData;
        }

        return array('form' => $form);
    }
}
