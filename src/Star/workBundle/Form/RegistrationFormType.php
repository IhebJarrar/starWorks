<?php

namespace Star\workBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class RegistrationFormType extends AbstractType
{
    //To override FOSUserBundle forms.we must call getParent() methods and save our form as a service..
    //Finally fix the configuration under fos.user in config.yml
    //http://symfony.com/doc/master/bundles/FOSUserBundle/overriding_forms.html
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName');
    }

    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }


}
