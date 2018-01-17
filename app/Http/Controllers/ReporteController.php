<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function Rcliente(){
      $clientes = Cliente::orderBy('nombre')->get();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('Reportes.reportecliente',compact('clientes'));
      $dompdf = $pdf->getDomPDF();

      $canvas = $dompdf->get_canvas();
      $canvas->page_text(30,755,'Generado: '.date('d/m/Y h:i:s a'),null,10,array(0,0,0));
      $canvas->page_text(500,755,("Página").": {PAGE_NUM} de {PAGE_COUNT}",  null,10,array(0,0,0));
      return $pdf->stream();
    }
}
