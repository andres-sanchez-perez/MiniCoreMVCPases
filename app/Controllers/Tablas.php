<?php 
namespace App\Controllers;

use App\Models\Pase;
use CodeIgniter\Controller;
use App\Models\Usuario;
use CodeIgniter\Config\View;
use DateTime;

class Tablas extends BaseController{

    
    public function index(){

        $pases = new Pase();

        $sql = "SELECT p.id as 'IdPase', u.id as 'IdUsuario',lp.id as 'IdLP',
                p.FechaCompra, lp.TipoDePase, lp.Cupo, lp.Pases,lp.CostoPase from Pase p
                join Usuario u on p.idUsuario = u.id
                join logicaPase lp on p.idLogicaPase = lp.id  ";

        $query = $pases->db->query($sql);
        $lista = array();
        foreach($query->getResultArray() as $result){
            $idUsuario = $result['IdUsuario'];
            $idPase = $result['IdPase'];
            $idLogicaPase = $result['IdLP'];
            $FechaCompra = $result['FechaCompra'];
            $TipoDePase = $result['TipoDePase'];
            $SaldoTotal = $result['Cupo'];
            $PasesTotales = $result['Pases'];
            $CostoPase = $result['CostoPase'];
            $FechaVencimiento =new DateTime();
            $pasesRestantes = 0;
            $saldoRestante = 0;
            if($TipoDePase == "Mensual"){
                $FechaVencimiento = date_add(new DateTime($FechaCompra),date_interval_create_from_date_string("1 months"));
                $hoy = new DateTime();
                $pasesRestantes = $PasesTotales - $hoy->diff(new DateTime($FechaCompra))->days;
                $saldoRestante = $SaldoTotal -(($hoy->diff(new DateTime($FechaCompra))->days)*$CostoPase);
            }
            else if($TipoDePase == "Semestral"){
                $FechaVencimiento = date_add(new DateTime($FechaCompra),date_interval_create_from_date_string("6 months"));
                $hoy = new DateTime();
                $pasesRestantes = $PasesTotales - $hoy->diff(new DateTime($FechaCompra))->days;
                $saldoRestante = $SaldoTotal -(($hoy->diff(new DateTime($FechaCompra))->days)*$CostoPase);
            }
            else{
                $FechaVencimiento = date_add(new DateTime($FechaCompra),date_interval_create_from_date_string("1 years"));
                $hoy = new DateTime();
                $pasesRestantes = $PasesTotales - $hoy->diff(new DateTime($FechaCompra))->days;
                $saldoRestante = $SaldoTotal -(($hoy->diff(new DateTime($FechaCompra))->days)*$CostoPase);
            }
            $data = [
                "idUsuario" => $idUsuario,
                "idPase" => $idPase,
                "idLogicaPase" => $idLogicaPase,
                "TipoDePase" => $TipoDePase,
                "FechaCompra" => $FechaCompra,
                "FechaVencimiento" => $FechaVencimiento->format('Y/m/d'),
                "SaldoTotal" => $SaldoTotal,
                "SaldoRestante" => $saldoRestante,
                "PasesTotales" => $PasesTotales,
                "PasesRestantes" => $pasesRestantes
            ];
            array_push($lista,$data);
        }

        $datos['Tablas'] = $lista;
        return View("Tablas/tabla",$datos);
    }
}