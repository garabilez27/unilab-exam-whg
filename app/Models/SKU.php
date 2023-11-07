<?php 

namespace App\Models;

use CodeIgniter\Model;

class SKU extends Model
{
    protected $table = 's_k_u_s';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'code', 'unitPrice', 'userID', 'img', 'active', 'createdBy'];
}

?>