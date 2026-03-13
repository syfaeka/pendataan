<?php

namespace App\Models;

use CodeIgniter\Model;

class KotaKabupatenModel extends Model
{
    protected $table            = 'kota_kabupaten';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
