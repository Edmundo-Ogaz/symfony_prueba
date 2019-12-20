<?php
// tests/Service/Service.php
namespace App\Tests\Service;

use App\Service\Service;
use App\Repository\Repository;
use PHPUnit\Framework\TestCase;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

use Monolog\Logger;
use Psr\Log\LoggerInterface;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Entity\CometidoNacionalGestion;

class ServiceTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByName()
    {
        $product = $this->entityManager
            ->getRepository('App\Entity\CometidoNacional')
            ->findOneBy(['id' => 11])
        ;

        $this->assertSame('15805886-3  ', $product->getRut());
    }

    protected function tearDown()
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }

    public function testSaveValidarPagoViatico()
    {
        self::bootKernel();

        // returns the real and unchanged service container
        $container = self::$kernel->getContainer();

        // gets the special container that allows fetching private services
        $container = self::$container;

        $object = new CometidoNacionalGestion();
        $object->setSolicitudEvaluarSolicitudJefaturaObservacion("prueba");

        $user = self::$container->get('App\Service\Service')->saveValidarPagoViatico($object, 11, null);

        $this->assertTrue($user);
    }
}
