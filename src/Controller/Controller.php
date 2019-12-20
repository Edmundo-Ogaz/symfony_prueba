<?php
// src/Controller/Controller.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Debug\Debug;
use App\Service\Service;
use App\Entity\CometidoNacionalGestion;

class Controller
{

    public function __construct(LoggerInterface $logger, Service $cometidoTramitarService)
    {
        $this->logger = $logger;
        $this->cometidoTramitarService = $cometidoTramitarService;
    }

    public function tramitar_validar_pago_viatico_save(){

        $idCometidoNacinal = 11;
        $idTask = null;

        try {

            $this->logger->info('Cometido controller save task validar pago viatico,' .
                ' idCometidoNacinal: ' . $idCometidoNacinal .
                ' idTask: ' . $idTask
            );



                    $object = new CometidoNacionalGestion();
                    $object->setSolicitudEvaluarSolicitudJefaturaObservacion("prueba");

                    $this->cometidoTramitarService->saveValidarPagoViatico($object, $idCometidoNacinal, $idTask);

                    $this->logger->info('Cometido controller save task validar pago viatico.');

                    $this->addFlash('success', 'Validar pago viatico realizado satisfactoriamente!');

        } catch(\Exception $e){

            $this->logger->error('Cometido controller save task validar pago viatico.'
                . ' Error: ' . $e->getMessage());
        }

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    public function tramitar_devengar_pago_viatico_save(){

        $idCometidoNacinal = 11;
        $idTask = null;

        try {

            $this->logger->info('Cometido controller save task devengar pago viatico,' .
                ' idCometidoNacional: ' . $idCometidoNacinal .
                ' idTask: ' . $idTask
            );

            // $cometidoNacionalGestion = new CometidoNacionalGestion();
            // $formulario = $this->createForm(DevengarPagoViaticoType::class, $cometidoNacionalGestion);
            // $formulario->handleRequest($request);

            // $this->logger->debug('Cometido controller save task devengar pago viatico form,' .
            //     ' isSubmitted: ' . $formulario->isSubmitted()
            // );

            // if($formulario->isSubmitted()) {

            //     if($formulario->isValid()){

                    // $this->logger->debug('Cometido controller save task devengar pago viatico form,'
                    //     . ' getData: ' . json_encode(print_r($formulario->getData()))
                    //     . ' devengarPagoViaticoObservacion: ' . $formulario->get('devengarPagoViaticoObservacion')->getData()
                    // );
                    // $cometidoNacionalGestionTramitar = $formulario->getData();
                    // $cometidoNacionalGestionTramitar->setDevengarPagoViaticoObservacion($formulario->get('devengarPagoViaticoObservacion')->getData());

                    // $object = new CometidoNacionalGestion();
                    // $object->setSolicitudVerificarDisponibilidadPresupuestariaObservacion("prueba2");

                    $object = new \stdClass();
                    $object->solicitudVerificarDisponibilidadPresupuestariaObservacion = "prueba2";

                    $this->cometidoTramitarService->saveDevengarPagoViatico($object, $idCometidoNacinal, $idTask);

                    $this->logger->info('Cometido controller save task devengar pago viatico.');

                    $this->addFlash('success', 'Devengar pago viatico realizado satisfactoriamente!');

            //     } else {

            //         $this->logger->error('Cometido controller save task devengar pago viatico.'
            //         . ' Error validación');
            //         $this->addFlash('error', 'Devengar pago viatico error validación');
            //     }
            // }

        } catch(\Exception $e){

            $this->logger->error('Cometido controller save task devengar pago viatico.'
                . ' Error: ' . $e->getMessage());
            $this->addFlash('error', 'Devengar pago viatico error' . ' ' . $e->getMessage());
        }

        return $this->redirectToRoute('bpmcometidos_bandeja_entrada', array('pestana' => 'misTareas'));
    }
}
