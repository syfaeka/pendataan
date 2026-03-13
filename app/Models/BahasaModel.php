<?php

namespace App\Models;

use CodeIgniter\Model;

class BahasaModel extends Model
{
    protected $table            = 'bahasa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
