<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Proveedor;
use App\ActivoFijo;
use App\Ventas;
use App\Compra;
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
    public function Rproveedor(){
      $proveedores = Proveedor::orderBy('nombre')->get();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('Reportes.reporteproveedor',compact('proveedores'));
      $dompdf = $pdf->getDomPDF();

      $canvas = $dompdf->get_canvas();
      $canvas->page_text(30,755,'Generado: '.date('d/m/Y h:i:s a'),null,10,array(0,0,0));
      $canvas->page_text(500,755,("Página").": {PAGE_NUM} de {PAGE_COUNT}",  null,10,array(0,0,0));
      return $pdf->stream();
    }
    public function Ractivofijo(){
      $activofijos = ActivoFijo::orderBy('nombre')->get();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('Reportes.reporteactivo',compact('activofijos'));
      $dompdf = $pdf->getDomPDF();

      $canvas = $dompdf->get_canvas();
      $canvas->page_text(30,755,'Generado: '.date('d/m/Y h:i:s a'),null,10,array(0,0,0));
      $canvas->page_text(500,755,("Página").": {PAGE_NUM} de {PAGE_COUNT}",  null,10,array(0,0,0));
      return $pdf->stream();
    }
    public function Rventa(){
      $ventas = Ventas::orderBy('id')->get();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('Reportes.reporteventa',compact('ventas'));
      $dompdf = $pdf->getDomPDF();

      $canvas = $dompdf->get_canvas();
      $canvas->page_text(30,755,'Generado: '.date('d/m/Y h:i:s a'),null,10,array(0,0,0));
      $canvas->page_text(500,755,("Página").": {PAGE_NUM} de {PAGE_COUNT}",  null,10,array(0,0,0));
      return $pdf->stream();
    }
    public function Rcompra(){
      $compras = Compra::orderBy('id')->get();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('Reportes.reportecompra',compact('compras'));
      $dompdf = $pdf->getDomPDF();

      $canvas = $dompdf->get_canvas();
      $canvas->page_text(30,755,'Generado: '.date('d/m/Y h:i:s a'),null,10,array(0,0,0));
      $canvas->page_text(500,755,("Página").": {PAGE_NUM} de {PAGE_COUNT}",  null,10,array(0,0,0));
      return $pdf->stream();
    }
}
