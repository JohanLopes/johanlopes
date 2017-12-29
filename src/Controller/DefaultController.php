<?php

namespace App\Controller;

use GuzzleHttp\Exception\BadResponseException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ContactType;
use App\Entity\Contact;
use App\Services\ProjectFinder;

/**
 * @Cache(expires="+7 days", public=true)
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function portfolio(ProjectFinder $projectFinder): Response
    {
        $projects = $projectFinder->findAll();

        return $this->render('default/portfolio.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @param Request $request
     * @param string $slug Project slug
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/project/{key}.html", name="project_show")
     */
    public function project(ProjectFinder $projectFinder, $key): Response
    {
        $project = $projectFinder->find($key);

        return $this->render('default/project.html.twig', [
            'project' => $project
        ]);
    }

    /**
     * @Route("/contact.html", name="contactForm")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactForm(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                 $message = (new \Swift_Message())
                    ->setSubject('[Johanlopes.fr] Nouveau message du formulaire de contact')
                    ->setFrom('no-reply@johanlopes.fr')
                    ->setReplyTo($form->getData()['email'])
                    ->setTo('lopes.johan@gmail.com')
                    ->setBody($this->renderView('contact/mail.html.twig', ['values' => $form->getData()]), 'text/html');

                $sent = $this->get('mailer')->send($message);

                return $this->render('contact/success.html.twig');
            } catch (\Exception $e) {
                return $this->render('contact/error.html.twig');
            }
        }

        return $this->render('contact/form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
