<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanAkhirModel extends Model
{
    protected $table            = 'pendidikan_akhir';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
