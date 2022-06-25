<?php 
namespace App\Models;

use CodeIgniter\Model;

class LogicaPase extends Model{
    protected $table      = 'logicaPase';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['TipoDePase','Cupo','Pases','CostoPase'];
    public function getLogicaPases(){
        return $this->findAll();
    }
}