<?php
namespace Noticias\UsuarioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\UsuarioBundle\Entity\Usuario;
use Noticias\PlazaBundle\Util\Util;

class Usuarios extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 20;
    }
	 public function load (ObjectManager $manager)
	{
		$plazas=$manager->getRepository('PlazaBundle:Plaza')->findAll();
		for ($i=0; $i <500 ; $i++) {
			$usuario= new Usuario();
			
			$usuario->setNombre($this->getNombre());
			$usuario->setApellidos($this->getApellidos());
			$usuario->setEmail('usuario@'.$i.'.promovision.local');
			//$usuario->setSalt(md5(time())); seran usadas mas adelante aun no se implementarlo
			$usuario->setSalt('584488484848'.$i);
            
            //$passwordEnClaro = 'usuario'.$i;
            //$encoder = $this->container->get('security.encoder_factory')->getEncoder($usuario);
            //$passwordCodificado = $encoder->encodePassword($passwordEnClaro, $usuario->getSalt());
            $usuario->setPassword('usuario'.$i);
			$usuario->setFechaNac(new \DateTime('now - '.rand(7000, 20000).' days'));
			$usuario->setTelCasa(rand(10000, 99999));
			$usuario->setTelOfi(rand(30000, 60000));
			$usuario->setNextel(rand(50000, 70000));
			$usuario->setCelular(rand(50000, 70000));
			$usuario->setAlias('usuario'.$i);
			$usuario->setActivo(true);
			$usuario->setSession(false);
			$usuario->setPuesto($this->getPuestos());
			$usuario->setPlaza($plazas[rand(0, count($plazas)-1)]);
		    $manager->persist($usuario);
			
		}
			$manager->flush();
		
	}
	private function getNombre()
    {
        
        $hombres = array('Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David', 'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier', 'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel', 'Ángel', 'Alejandro', 'Miguel Ángel', 'José María', 'Fernando', 'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto');
        $mujeres = array('María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María', 'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca', 'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta', 'María José', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción', 'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María');
        
        if (rand() % 2) {
            return $hombres[rand(0, count($hombres)-1)];
        }
        else {
            return $mujeres[rand(0, count($mujeres)-1)];
        }
    }
  private function getApellidos()
    {
        
        $apellidos = array('García', 'González', 'Rodríguez', 'Fernández', 'López', 'Martínez', 'Sánchez', 'Pérez', 'Gómez', 'Martín', 'Jiménez', 'Ruiz', 'Hernández', 'Díaz', 'Moreno', 'Álvarez', 'Muñoz', 'Romero', 'Alonso', 'Gutiérrez', 'Navarro', 'Torres', 'Domínguez', 'Vázquez', 'Ramos', 'Gil', 'Ramírez', 'Serrano', 'Blanco', 'Suárez', 'Molina', 'Morales', 'Ortega', 'Delgado', 'Castro', 'Ortíz', 'Rubio', 'Marín', 'Sanz', 'Iglesias', 'Nuñez', 'Medina', 'Garrido');
        
        return $apellidos[rand(0, count($apellidos)-1)].' '.$apellidos[rand(0, count($apellidos)-1)];
    }
	 private function getPuestos()
    {
        
        $puestos = array('Programador', 'Jefe', 'Reportero', 'Camarografo', 'Ilusinista', 'Mago', 'Administrador', 'Columnista', 'Jornalero', 'Policia', 'Militar', 'Gordito');
        
        return $puestos[rand(0, count($puestos)-1)];
    }
}