<?php 
namespace App\Models;

use CodeIgniter\Model;

class Pase extends Model{
    protected $table      = 'Pase';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['idUsuario','idLogicaPase','FechaCompra'];
    public function getPases(){
        return $this->findAll();
    }
}