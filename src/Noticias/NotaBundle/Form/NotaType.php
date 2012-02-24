<?php


namespace Noticias\NotaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class NotaType extends AbstractType
 {
     public function buildForm(FormBuilder $builder,array $options)
     {
         $builder->add('titulo')
                 ->add('camarografo')          
                 ->add('editor')
                 ->add('conductor')             
                 ->add('urgente')
                 ->add('fecha_crea','birthday', array('label'=> 'Fecha de creacion'))
                 ->add('fecha_succ','birthday', array('label'=> 'Fecha del suceso'))
                 ->add('estatal')
                 ->add('anual');
                 
     }
     public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Noticias\NotaBundle\Entity\Nota',);
    }
     public function getName()
     {
          return 'nota';
     }


 }