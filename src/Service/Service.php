<?php
// src/Service/Service.php
namespace App\Service;

use Psr\Log\LoggerInterface;
use App\Repository\Repository;

class Service
{
    private $logger;

    public function __construct(LoggerInterface $logger, Repository $cometidoTramitarRepository)
    {
        $this->logger = $logger;
        $this->cometidoTramitarRepository = $cometidoTramitarRepository;
    }

    public function saveValidarPagoViatico($object, $idCometidoNacinal, $idTask)
    {
        $this->logger->info('Cometido tramitar service save validar pago viatico'
            . ' request: ' . json_encode($object));

        $this->cometidoTramitarRepository->saveValidarPagoViatico($object, $idCometidoNacinal);

        // $contractValues = array("resultValidarEjecutivoViatico" => $object->validarPagoViaticoStatus);
        // $taskExecute = $this->bonitaApiRest->getBpm()->executeTask($idTask, $contractValues);

        $this->logger->info('Cometido tramitar service save validar pago viatico response');

        return true;
    }

    public function saveDevengarPagoViatico($object, $idCometidoNacinal, $idTask)
    {
        $this->logger->info('Cometido tramitar service save devengar pago viatico'
            . ' request: ' . json_encode($object));

        $this->cometidoTramitarRepository->saveDevengarPagoViatico($object, $idCometidoNacinal);

        // $contractValues = null
        // $taskExecute = $this->bonitaApiRest->getBpm()->executeTask($idTask, $contractValues);

        $this->logger->info('Cometido tramitar service save devengar pago viatico response');

        return true;
    }
}
