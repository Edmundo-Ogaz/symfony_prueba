<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Spipu\Html2Pdf\Html2Pdf;
use App\Service\AlfrescoService;

class PdfController
{
  private $urlBase = "http://localhost:9080/alfresco/api/-default-/public/alfresco/versions/1/nodes";

    public function __construct(LoggerInterface $logger, AlfrescoService $alfrescoService)
    {
        $this->logger = $logger;
        $this->alfresco = $alfrescoService;
    }

    public function PdfCometidoNacional()
    {
    	//Creación PDF
    	$content = '
			<style type="text/css">
				body {
					color: black;
					background-repeat: repeat-x;
					padding: 0px;
					max-width: 800px;
					margin: 0 auto !important;
					float: none !important;
				}

				.mainc {
					margin:0 auto;
					width:700px;
					display:block;
					padding-bottom: 0px;
				}

				.destacado {
					margin:0px;
				}

				.txt {
					font-size: 16px;
					margin:0px;
					line-height: 20px;
					text-align: center !important;
				}

				.txt2 {
					font-size: 16px;
					margin-top:100px;
					line-height: 20px;
					width: 700px;
					text-align: right;
				}
				.txt3 {
					font-size: 16px;
					margin:0px;
					line-height: 20px;
					width: 700px;
					text-align: center;
				}

				h1 {
					font-size:25px;
					text-align: center;
				}
				h2 {
					font-size:20px;
					text-align: left;
				}
				p {
					font-size:12px;
					text-align: left;
					padding-left:0px;
				}

				.mainc p {
					font-size:16px;
					text-align: justify;
				}
				#hor-minimalist-b {
					background: #fff;
					margin-top:10px;
					border-collapse: collapse;
					text-align: left;
					border-bottom:solid 3px #999999;
					width: 820px;
				}
				#hor-minimalist-b th {
					padding: 10px 0 8px 0;
					border-bottom: 2px solid #CCC;
					background-color:#666;
					color:#FFFFFF;
				}
				#hor-minimalist-b td {
					border-bottom: 1px solid #ccc;
				}

			</style>
			<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
      			<table width="750" border="0">
				  <tr>
				    <td><img src="'.__DIR__.'/../../public/images/logo-footer.png" /></td>
				  </tr>
				   <tr>
				    <td>
				    	<table width="750" border="0" cellpadding="8" cellspacing="8">
				      		<tr>
				      			<td>
					      			<div id="mainc" class="mainc">
					      				<h1>Solcitud Cometido Nacional</h1>
									</div>
				      			</td>
				      		</tr>
				    	</table>
				   	</td>
				  </tr>
				</table>
				<table width="750" border="0" cellpadding="5" cellspacing="10" bgcolor="#FFFFFF">
					<tr>
						<td colspan="2"><h2>Datos Cometido</h2></td>
					</tr>
					<tr>
						<td valign="top">Nombre Funcionario:</td>
						<td align="left">Edmundo Ogaz</td>
					</tr>
					<tr>
						<td valign="top">Centro de Costo:</td>
						<td align="left">'.date('Y_m_d-H-i-s').'</td>
					</tr>
					<tr>
						<td valign="top">Grado:</td>
						<td align="left">xxxxxxxxxx</td>
					</tr>
					<tr>
						<td valign="top">Calidad Jurídica:</td>
						<td align="left">xxxxxxxxxx</td>
					</tr>
					<tr>
						<td valign="top">Escalafón:</td>
						<td align="left">xxxxxxxxxx</td>
					</tr>
					<tr>
						<td valign="top">Motivo General del Cometido:</td>
						<td align="left">xxxxxxxxxx</td>
					</tr>
				</table>
			</page>';

    	//Fin Creación PDF
    	$html2pdf = new Html2Pdf('P','A4','es', true, 'UTF-8',  array(0, 0, 0, 0));
    	$html2pdf->pdf->SetDisplayMode('fullpage');
    	$html2pdf->setTestTdInOnePage(false);
    	$html2pdf->setDefaultFont('Arial');
    	$html2pdf->writeHTML($content);

    	//$nombre = "Solicitud-".$rut.".pdf";
    	$nombre = "prueba.pdf";
      $contentsFile = $html2pdf->Output($nombre, 'S');

      $idNode = "27edfad8-5856-4431-b024-6954a6e07e2b";
      $where="(isFolder=true)";
      $retornoApiGet = $this->alfresco->getNodesChildren($idNode, $where);
      $this->logger->debug('retornoApiGet ' . json_encode($retornoApiGet));
      $exist = false;
      $idNodo = null;
      $entries = $retornoApiGet['data']->list->entries;
      foreach($entries as $value){
        $this->logger->debug('value ' . json_encode($value));
        if ($value->entry->name === "X"){
          $idFolder = $value->entry->id;
          $where="(isFile=true)";
          $retornoApiGetFile = $this->getNodesChildren($idFolder,$where);
          $entriesFile = $retornoApiGetFile['data']->list->entries;
          $this->logger->debug('entriesFile ' . json_encode($entriesFile));
          foreach($entriesFile as $valueFile){
            $this->logger->debug('valueFile ' . json_encode($valueFile));
            if ($valueFile->entry->name === "prueba.pdf"){
              $exist = true;
              $idNodo =  $valueFile->entry->id;
            }
          }
        }
      }
      $this->logger->debug('exist ' . json_encode($exist));

      // $exist = false;
      // if ($exist) {
      //     $params = array("minorVersion" => true,
      //                 "comment" => "First version");
      //     $retornoApiContent = $this->putNodesContent($idNodo, $contentsFile, $params);
      //     $this->logger->info('retornoApiContent ' . json_encode($retornoApiContent));
      // } else {

      //   $data = array(
      //     "name" => $nombre,
      //     "nodeType" => "cm:content",
      //     "properties"=> array(
      //         "cm:title"=>"pdfprueba",
      //         "cm:description"=>"description test"
      //     ),
      //     "relativePath"=> "X"
      //   );

      //   $retornoApi = $this->postNodesChildren($data);
      //   $this->logger->info('retornoApi ' . json_encode($retornoApi));

      //   if ($retornoApi["status"]=="201") {
      //       $idNewNodo = $retornoApi["data"]->entry->id;
      //       $params = array("majorVersion" => true,
      //                   "comment" => "First version");
      //       $retornoApiContent = $this->putNodesContent($idNewNodo, $contentsFile , $params);
      //       $this->logger->info('retornoApiContent ' . json_encode($retornoApiContent));
      //   }
      // }

    	return new Response(
        '<html><body>Lucky number: '.$exist.'</body></html>'
    );

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

  public function  putNodesContent($idNode,$dataContentBodyUpdate, $params){

    $urlParameters = http_build_query($params);

    $url = $this->urlBase."/".$idNode."/content?".$urlParameters;

    $this->logger->info('putNodesContent urlBase ' . $url);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    $headers = array(
        'Content-Type: application/json',
        'Authorization:  Basic YWRtaW46YWRtaW4=',
    );
    // $headers = array(
    //   'Content-Type: application/json',
    //   'Authorization:  Basic YWRtaW46YWRtaW4=',
    // );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $postdata = json_encode(array("contentBodyUpdate"=>$dataContentBodyUpdate));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataContentBodyUpdate);
    // $this->logger->info('putNodesContent dataContentBodyUpdate ' . json_encode($dataContentBodyUpdate));
    // curl_setopt($ch, CURLOPT_POSTFIELDS, "text plain");

    $dataResultConeccion = curl_exec($ch);
    $this->logger->info('putNodesContent dataResultConeccion ' . json_encode($dataResultConeccion));
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
}
