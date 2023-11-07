<?php 

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'fullname', 'mobileNumber', 'city', 'active', 'userID', 'createdBy'];
}

?>