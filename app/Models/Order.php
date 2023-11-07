<?php 

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customerID', 'dateOfDelivery', 'status', 'amountDue', 'userID'];
}

?>