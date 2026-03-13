<?php

namespace App\Models;

use CodeIgniter\Model;

class KbliModel extends Model
{
    protected $table            = 'kbli';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
