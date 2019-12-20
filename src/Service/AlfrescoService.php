<?php
// src/Service/AlfrescoService.php
namespace App\Service;

use Psr\Log\LoggerInterface;

class AlfrescoService
{
//   private $urlBase = "http://localhost:9080/alfresco/api/-default-/public/alfresco/versions/1/nodes";

    public function __construct(LoggerInterface $logger, $alfrescoParemeter)
    {
        $this->logger = $logger;
        $this->logger->debug('alfrescoParemeter ' . json_encode($alfrescoParemeter));
        $this->logger->debug('getType ' . getType($alfrescoParemeter));
        $this->logger->debug('url ' . $alfrescoParemeter['url']);
        $this->urlBase = $alfrescoParemeter['url'];
    }

    public function  getNodesChildren($idNode, $where){

      $url = $this->urlBase."/".$idNode."/children?where=".$where;
      $this->logger->debug('url ' . $url);

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);

      $headers = array(
          'Content-Type: application/json',
          'Authorization:  Basic YWRtaW46YWRtaW4=',
      );
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $dataResultConeccion = curl_exec($ch);
      if (!curl_errno($ch)) {
          $codigoReturn= curl_getinfo($ch, CURLINFO_HTTP_CODE);
      }else{
          $codigoReturn="200";
      }

      $dataResultConeccionReturn=null;
      if ($codigoReturn=="200"){
          $dataResultConeccionReturn=json_decode($dataResultConeccion);
      }

      curl_close($ch);
      return array("status"=>$codigoReturn,"data"=>$dataResultConeccionReturn);
  }

    public function  postNodesChildren($data){

      $url = $this->urlBase."/".$idNode."/children";

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);

      $headers = array(
          'Content-Type: application/json',
          'Authorization:  Basic YWRtaW46YWRtaW4=',
      );
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $postdata = json_encode($data);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

      $dataResultConeccion = curl_exec($ch);
      if (!curl_errno($ch)) {
          $codigoReturn= curl_getinfo($ch, CURLINFO_HTTP_CODE);
      }else{
          $codigoReturn="201";
      }

      $dataResultConeccionReturn=null;
      if ($codigoReturn=="201"){
          $dataResultConeccionReturn=json_decode($dataResultConeccion);
      }

      curl_close($ch);
      return array("status"=>$codigoReturn,"data"=>$dataResultConeccionReturn);
  }
}
