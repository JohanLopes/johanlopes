<?php

namespace Johanlopes\CoreBundle\Controller;

use GuzzleHttp\Exception\BadResponseException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Johanlopes\CoreBundle\Form\ContactType;
use Johanlopes\CoreBundle\Entity\Contact;

/**
 * Default controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     * @return array
     */
    public function indexAction(Request $request)
    {
        $response = new Response();
        $response->setPublic();
        $response->setPrivate();
        $response->setMaxAge(600);
        $response->setSharedMaxAge(600);
        $response->headers->addCacheControlDirective('must-revalidate', true);

        if ($response->isNotModified($request)) {
            return $response;
        }

        $twitter = $this->getTweeterFeed();
        $response->setContent($this->renderView('JohanlopesCoreBundle:Default:index.html.twig',array('twitter' => $twitter)));

        return $response;
    }

    /**
     * getTweeterFeed
     *
     * @return array $twitter
     */
    protected function getTweeterFeed()
    {
        try {
            $twitterClient   = $this->container->get('guzzle.twitter.client');
            $twitterResponse = $twitterClient->get('statuses/user_timeline.json?screen_name=johan_lopes&count=1')->getBody()->getContents();
            $twitterResponse = json_decode($twitterResponse, true);

            $twitterId      = isset($twitterResponse[0]['id']) ? $twitterResponse[0]['id'] : null;
            $twitterDate    = isset($twitterResponse[0]['created_at']) ? $twitterResponse[0]['created_at'] : null;
            $twitterMessage = isset($twitterResponse[0]['text']) ? $twitterResponse[0]['text'] : null;

            $twitter = array('id' => $twitterId, 'date' => $twitterDate, 'message' => $twitterMessage);
        } catch (BadResponseException $e) {
            $twitter = null;
        }

        return $twitter;
    }

    /**
     * @Template()
     * @return array
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
     * @param string $slug Project slug
     *
     * @return Response $response
     * @Route("/project/{slug}.html", name="project_show")
     * @Template()
     */
    public function projectAction(Request $request, $slug)
    {
        $project = $this->getDoctrine()->getRepository('JohanlopesCoreBundle:Project')->findOneBySlug($slug);
        $response = array('project' => $project);

        if ($request->isXmlHttpRequest()) {
            return $this->render('JohanlopesCoreBundle:Default:project.html.twig', $response);
        }

        return $response;
    }

    /**
     * @Route("/contact.html", name="contact")
     * @Template()
     * @return array
     */
    public function contactFormAction(Request $request)
    {
        $sent = false;
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sent = $this->sendContactMessage($form->getData());
        }

        return array('form' => $form->createView(), 'sent' => $sent);
    }

    /**
     * send Contact Message
     *
     * @param  array $values
     *
     * @return boolean
     */
    protected function sendContactMessage(Contact $values)
    {
        try {
            $message = \Swift_Message::newInstance()
                ->setSubject('[Johanlopes.fr] Nouveau message du formulaire de contact')
                ->setFrom($values->getEmail())
                ->setTo('lopes.johan@gmail.com')
                ->setBody($this->renderView('JohanlopesCoreBundle:Mail:contact.html.twig', array('values' => $values)), 'text/html');

            $this->get('mailer')->send($message);

            return true;
        } catch (\Exception $e) {
        }

        return false;
    }
}
