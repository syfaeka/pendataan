<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

// Import all Master Models
use App\Models\NegaraModel;
use App\Models\ProvinsiModel;
use App\Models\KotaKabupatenModel;
use App\Models\StatusKepegawaianModel;
use App\Models\JenisTenagaAhliModel;
use App\Models\KewarganegaraanModel;
use App\Models\BahasaModel;
use App\Models\PendidikanAkhirModel;
use App\Models\KbliModel;
use App\Models\KategoriPekerjaanModel;
use App\Models\JenisInstansiModel;
use App\Models\NamaInstansiModel;
use App\Models\SatuanKerjaModel;

class Master extends BaseController
{
    /**
     * Map URI segments to their respective Model classes & human labels.
     */
    private array $tableMap = [
        'negara'             => ['model' => NegaraModel::class,            'label' => 'Negara'],
        'provinsi'           => ['model' => ProvinsiModel::class,          'label' => 'Provinsi'],
        'kota_kabupaten'     => ['model' => KotaKabupatenModel::class,     'label' => 'Kota/Kabupaten'],
        'status_kepegawaian' => ['model' => StatusKepegawaianModel::class, 'label' => 'Status Kepegawaian'],
        'jenis_tenaga_ahli'  => ['model' => JenisTenagaAhliModel::class,   'label' => 'Jenis Tenaga Ahli'],
        'kewarganegaraan'    => ['model' => KewarganegaraanModel::class,   'label' => 'Kewarganegaraan'],
        'bahasa'             => ['model' => BahasaModel::class,            'label' => 'Bahasa'],
        'pendidikan_akhir'   => ['model' => PendidikanAkhirModel::class,   'label' => 'Pendidikan Akhir'],
        'kbli'               => ['model' => KbliModel::class,              'label' => 'KBLI'],
        'kategori_pekerjaan' => ['model' => KategoriPekerjaanModel::class, 'label' => 'Kategori Pekerjaan'],
        'jenis_instansi'     => ['model' => JenisInstansiModel::class,     'label' => 'Jenis Instansi'],
        'nama_instansi'      => ['model' => NamaInstansiModel::class,      'label' => 'Nama Instansi'],
        'satuan_kerja'       => ['model' => SatuanKerjaModel::class,       'label' => 'Satuan Kerja'],
    ];

    /**
     * Helper to load the model based on the table slug.
     * Throws 404 if invalid.
     */
    private function getModel($table)
    {
        if (!array_key_exists($table, $this->tableMap)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $modelClass = $this->tableMap[$table]['model'];
        return new $modelClass();
    }

    /**
     * Helper to get the human-readable label
     */
    private function getLabel($table)
    {
        return $this->tableMap[$table]['label'];
    }

    // ------------------------------------------------------------------------

    /**
     * Custom override for exact matches on index router
     * e.g. /master/negara
     */
    public function index(string $table = '')
    {
        if (empty($table)) {
            // If they just visit /master, redirect to the first one (negara)
            return redirect()->to(base_url('master/negara'));
        }

        $model = $this->getModel($table);
        $label = $this->getLabel($table);

        $data = [
            'table' => $table,
            'title' => $label,
            'data'  => $model->findAll()
        ];

        return view('master/index', $data);
    }

    public function store(string $table)
    {
        $model = $this->getModel($table);
        $label = $this->getLabel($table);

        $rules = [
            'name' => 'required|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        $model->insert([
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to(base_url('master/' . $table))->with('success', "Data $label berhasil ditambahkan.");
    }

    public function update(string $table, int $id)
    {
        $model = $this->getModel($table);
        $label = $this->getLabel($table);

        $rules = [
            'name' => 'required|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        $model->update($id, [
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to(base_url('master/' . $table))->with('success', "Data $label berhasil diupdate.");
    }

    public function delete(string $table, int $id)
    {
        $model = $this->getModel($table);
        $label = $this->getLabel($table);

        // Optional: Check if the ID exists first
        if (!$model->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model->delete($id);

        return redirect()->to(base_url('master/' . $table))->with('success', "Data $label berhasil dihapus.");
    }
}
