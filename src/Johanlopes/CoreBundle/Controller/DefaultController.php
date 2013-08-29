<?php

namespace Johanlopes\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Template()
     */
    public function portfolioAction()
    {
        $categories = $this->getDoctrine()->getRepository('JohanlopesCoreBundle:Category')->findAllSorted();
        $projects   = $this->getDoctrine()->getRepository('JohanlopesCoreBundle:Project')->findAllSorted();

        return array(
            'categories' => $categories,
            'projects' => $projects
        );
    }

    /**
     * @Route("/project/{slug}.html", name="project_show")
     * @Template()
     */
    public function projectAction($slug)
    {
        $project = $this->getDoctrine()->getRepository('JohanlopesCoreBundle:Project')->findOneBySlug($slug);
        $response = array('project' => $project);

        if($this->getRequest()->isXmlHttpRequest())
        {
            return $this->render('JohanlopesCoreBundle:Default:project.html.twig', $response);
        }

        return $response;
    }
}
