<?php

namespace IRY\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;

use IRY\AppliBundle\Entity\Result;
use IRY\AppliBundle\Form\Type\ResultType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ResultController extends Controller implements ClassResourceInterface
{
    /**
     * This API method returns the list of all the Results currently connected
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
		$repo = $em->getRepository('IRYAppliBundle:Result');
		$data = $repo->findAll();

		return array("data" => $data);
    }

    /**
     * Get one Result by giving it's id in parameter.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This API method returns one Result.",
     * )
     * filters={
     *      {"name"="ResultId", "dataType"="integer"},
     * }
     *
     * @param Result $result
     * @return array
     * @View()
     */
    public function getAction(Result $result)
    {
		return $result;
    }

    /**
     * Add one Result
     *
     * @ApiDoc(
     *  description="This API method create one Result.",
     *  input="IRY\AppliBundle\Form\Type\ResultType",
     *  output="IRY\AppliBundle\Entity\Result"
     * )
     *
     * @param Result $result
     * @return array
     * @View()
     */
    public function postAction()
    {
		return $this->processForm(new Result());
    }

     /**
     * Delete a Result
     *
     * @ApiDoc(
     *  description="This API method deletes a Result.",
     * )
     *
     * @param Result $result
     * @return array
     * @View()
     */
    public function deleteAction(Result $result)
    {
	    $em = $this->getDoctrine()->getManager();
	    $em->remove($result);
	    $em->flush();

	    return array("status" => 200);
    }

    private function processForm(Result $result)
    {
        $form = $this->createForm(new ResultType(), $result);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($result);
            $em->flush();

            return $result;
        }

        return array('form' => $form);
    }

    /**
     * This API method edit a Result giving it's id
     *
     * @ApiDoc(
     *  resource=true,
     * )
     *
     * @return array
     * @View()
     */
    public function putAction(Result $result)
    {
        echo $result->getPilot()->getId();
        $form = $this->createForm(new ResultType(), $result, array('method' => 'PUT'));
        $form->bind($this->getRequest());

        echo $result->getPilot()->getId();
        die();
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($result);
            $em->flush();

        echo $result->getPilot()->getId();
        die();
            return $result;
        }
        echo "invaliiiiid";
        die();

        return array('form' => $form);
    }
}
