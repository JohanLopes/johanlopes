<?php
namespace Johanlopes\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Contact form
 */
class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('message', 'textarea')
            ->add('captcha', 'captcha');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Johanlopes\CoreBundle\Entity\Contact',
        ));
    }
}
