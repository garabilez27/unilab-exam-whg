<?php 

namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table = 'purchase_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['poID', 'skuID', 'quantity', 'price', 'userID'];
}

?>