<?php

namespace App\Models;

use CodeIgniter\Model;

class NegaraModel extends Model
{
    protected $table            = 'negara';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
