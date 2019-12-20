<?php
// tests/Service/RepositoryTest.php
namespace App\Tests\Service;

use App\Entity\CometidoNacionalGestion;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class RepositoryTest extends WebTestCase
{
    public function testSaveValidarPagoViatico()
    {
        self::bootKernel();

        // returns the real and unchanged service container
        $container = self::$kernel->getContainer();

        // gets the special container that allows fetching private services
        $container = self::$container;

        $object = new CometidoNacionalGestion();
        $object->setSolicitudEvaluarSolicitudJefaturaObservacion("prueba");

        $user = self::$container->get('App\Repository\Repository')->saveValidarPagoViatico($object, 11);

        $this->assertTrue($user);
    }
}
