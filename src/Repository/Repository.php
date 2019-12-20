<?php
// src/Repository/Repository.php
namespace App\Repository;

use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;

class Repository extends EntityRepository
{
    private $logger;

    public function __construct(LoggerInterface $logger, ObjectManager $objectManager)
    {
        $this->logger = $logger;
        $this->objectManager = $objectManager;
    }

    public function saveValidarPagoViatico($object, $idCometidoNacinal)
    {
        $this->logger->info('Cometido tramitar repository save validar pago viático'
            . ' request: ' . json_encode($object)
        );

        $em = $this->objectManager;
        $cometido = $em->getRepository('App\Entity\CometidoNacional')->findOneBy(array(
            'id' => $idCometidoNacinal));

        $cometidoGestion = $em->getRepository('App\Entity\CometidoNacionalGestion')->findOneBy(array(
            'cometidoNacional' => $cometido));

        if(is_null($cometidoGestion)){
            $this->logger->debug('Cometido tramitar repository save cometido tramitar new cometido tramitar.');
            $cometidoGestion = new CometidoNacionalGestion();
            $cometidoGestion->setCometidoNacional($cometido);
        }

        $this->logger->debug('Cometido tramitar repository save cometido tramitar field'
            . ' observacion: ' . gettype($object));
        $this->logger->debug('Cometido tramitar repository save cometido tramitar object'
            . ' observacion: ' . $object->getSolicitudEvaluarSolicitudJefaturaObservacion());

        $cometidoGestion->setSolicitudEvaluarSolicitudJefaturaObservacion($object->getSolicitudEvaluarSolicitudJefaturaObservacion());
        // $cometidoGestion->setSolicitudEvaluarSolicitudJefaturaObservacion("test");
        $cometidoGestion->setSolicitudEvaluarSolicitudJefaturaUsuario('test1');
        $cometidoGestion->setSolicitudEvaluarSolicitudJefaturaFecha(new \Datetime());

        $this->logger->debug('Cometido tramitar repository save cometido tramitar cometidoGestion'
            . ' observacion: ' . $cometidoGestion->getSolicitudEvaluarSolicitudJefaturaObservacion());

        $em->persist($cometidoGestion);
        $em->flush();

        return true;
    }

    public function saveDevengarPagoViatico($object, $idCometidoNacinal)
    {
        $this->logger->info('Cometido tramitar repository save devengar pago viático request'
            . ' object: ' . json_encode($object)
            . ' idCometidoNacional: ' . $idCometidoNacinal);

        $em = $this->objectManager;
        $cometido = $em->getRepository('App\Entity\CometidoNacional')->findOneBy(array(
            'id' => $idCometidoNacinal));

        $cometidoGestion = $em->getRepository('App\Entity\CometidoNacionalGestion')->findOneBy(array(
            'cometidoNacional' => $cometido));

        if(is_null($cometidoGestion)){
            $this->logger->debug('Cometido tramitar repository save cometido tramitar new cometido tramitar.');
            $cometidoGestion = new CometidoNacionalGestion();
            $cometidoGestion->setCometidoNacional($cometido);
        }

        $this->logger->debug('Cometido tramitar repository save devengar pago viático object ' . json_encode($object));
        // $this->logger->debug('Cometido tramitar repository save devengar pago viático __toString ' . $object->__toString());

        $cometidoGestion->setSolicitudVerificarDisponibilidadPresupuestariaObservacion($object->solicitudVerificarDisponibilidadPresupuestariaObservacion);
        $cometidoGestion->setSolicitudVerificarDisponibilidadPresupuestariaUsuario("test2");
        $cometidoGestion->setSolicitudVerificarDisponibilidadPresupuestariaFecha(new \Datetime());

        $this->logger->debug('Cometido tramitar repository save devengar pago viático setDevengarPagoViaticoObservacion ' . $cometidoGestion->getSolicitudVerificarDisponibilidadPresupuestariaObservacion());
        $this->logger->debug('Cometido tramitar repository save devengar pago viático setDevengarPagoViaticoUsuario ' . $cometidoGestion->getSolicitudVerificarDisponibilidadPresupuestariaUsuario());
        $this->logger->debug('Cometido tramitar repository save devengar pago viático setDevengarPagoViaticoFecha ' . $cometidoGestion->getSolicitudVerificarDisponibilidadPresupuestariaFecha()->format('d/m/Y'));

        // $this->logger->debug('Cometido tramitar repository save devengar pago viático cometidoGestion __toString ' . $cometidoGestion->__toString());

        $em->persist($cometidoGestion);
        $em->flush();

        $this->logger->info('Cometido tramitar repository save devengar pago viático response');

        return true;
    }

}
