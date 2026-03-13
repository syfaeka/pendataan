<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusKepegawaianModel extends Model
{
    protected $table            = 'status_kepegawaian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
