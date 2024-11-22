<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'tb_order';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = [
        'no_order', 
        'judul_order', 
        'jenis', 
        'kategori', 
        'detail',
        'status', 
        'email', 
        'file_name', 
        'file_type', 
        'file_size', 
        'file_path', 
        'tanggal_input', 
        'tanggal_ubah'
    ]; 

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_ubah';
   

   
}
