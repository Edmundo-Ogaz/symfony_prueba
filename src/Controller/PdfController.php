<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Spipu\Html2Pdf\Html2Pdf;

class PdfController
{
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
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
						<td align="left">xxxxxxxxxx</td>
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
    	$html2pdf->Output($nombre, 'D');

    	return;

    }
}
