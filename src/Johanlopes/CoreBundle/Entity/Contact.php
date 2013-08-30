<?php

namespace Johanlopes\CoreBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Johanlopes\PortfolioBundle\Entity\Contact
 */
class Contact
{
    /**
     * @var string $name
     * @Assert\NotBlank(message="Vous devez renseigner votre nom")
     */
    private $name;

    /**
     * @var string $email
     * @Assert\NotBlank(message="Vous devez renseigner votre adresse e-mail")
     * @Assert\Email(message="Vous devez renseigner une adresse e-mail valide")
     */
    private $email;

    /**
     * @var string $company
     */
    private $company;

    /**
     * @var text $message
     * @Assert\NotBlank(message="Vous devez renseigner votre message")
     */
    private $message;


    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set message
     *
     * @param text $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return text
     */
    public function getMessage()
    {
        return $this->message;
    }
}
