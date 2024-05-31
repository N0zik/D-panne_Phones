<?php

// src/Controller/ContactController.php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Send email to admin
            $email = (new Email())
                ->from($contact->getEmail())
                ->to('admin@example.com')
                ->subject('Contact Form Submission')
                ->text(sprintf(
                    "Name: %s %s\nEmail: %s\nPhone: %s\nMessage:\n%s",
                    $contact->getFirstName(),
                    $contact->getLastName(),
                    $contact->getEmail(),
                    $contact->getPhone(),
                    $contact->getMessage()
                ));

            $mailer->send($email);

            $this->addFlash('success', 'Your message has been sent!');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
