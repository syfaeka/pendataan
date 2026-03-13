<?php

namespace App\Controllers;

use App\Models\DataPekerjaModel;

use App\Models\StatusKepegawaianModel;
use App\Models\JenisTenagaAhliModel;
use App\Models\KewarganegaraanModel;
use App\Models\NegaraModel;
use App\Models\KotaKabupatenModel;
use App\Models\ProvinsiModel;
use App\Models\PendidikanAkhirModel;

class DataPekerja extends BaseController
{
    protected $pekerjaModel;

    public function __construct()
    {
        $this->pekerjaModel = new DataPekerjaModel();
    }


    public function index()
    {
        $data['pekerja'] = $this->pekerjaModel
            ->select('data_pekerja.*,
                      sk.name  as status_name,
                      jta.name as ahli_name,
                      kw.name  as kewarganegaraan_name,
                      nl.name  as negara_name,
                      kl.name  as kota_lahir_name,
                      prov.name as provinsi_name,
                      kot.name  as kota_name,
                      pa.name   as pendidikan_name')
            ->join('status_kepegawaian sk',  'sk.id   = data_pekerja.id_status_kepegawaian', 'left')
            ->join('jenis_tenaga_ahli jta',  'jta.id  = data_pekerja.id_jenis_tenaga_ahli',  'left')
            ->join('kewarganegaraan kw',     'kw.id   = data_pekerja.id_kewarganegaraan',    'left')
            ->join('negara nl',              'nl.id   = data_pekerja.id_negara_lahir',        'left')
            ->join('kota_kabupaten kl',      'kl.id   = data_pekerja.id_kota_lahir',          'left')
            ->join('provinsi prov',          'prov.id = data_pekerja.id_provinsi',            'left')
            ->join('kota_kabupaten kot',     'kot.id  = data_pekerja.id_kota',                'left')
            ->join('pendidikan_akhir pa',    'pa.id   = data_pekerja.id_pendidikan_akhir',    'left')
            ->findAll();

        return view('pekerja/index', $data);
    }

    public function create()
    {
        return view('pekerja/form', $this->getFormData());
    }

    public function store()
    {
        $rules = [
            'nama' => 'required|max_length[255]',
            // Add more specific validation as needed
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pekerjaModel->insert($this->request->getPost());

        return redirect()->to(base_url('datapekerja'))->with('success', 'Data Pekerja berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->getFormData();
        $data['pekerja'] = $this->pekerjaModel->find($id);

        if (!$data['pekerja']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('pekerja/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Only update allowed fields (handled by CI4 Model allowedFields)
        $this->pekerjaModel->update($id, $this->request->getPost());

        return redirect()->to(base_url('datapekerja'))->with('success', 'Data Pekerja berhasil diupdate.');
    }

    public function delete($id)
    {
        if (!$this->pekerjaModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->pekerjaModel->delete($id);

        return redirect()->to(base_url('datapekerja'))->with('success', 'Data Pekerja berhasil dihapus.');
    }

    public function new()
    {
        helper('form');
        return view('pekerja/form');
    }


    /**
     * Helper to load all master data for the form dropdowns
     */
    private function getFormData()
    {
        return [
            'status_pegawai' => (new StatusKepegawaianModel())->findAll(),
            'jenis_ahli' => (new JenisTenagaAhliModel())->findAll(),
            'warga_negara' => (new KewarganegaraanModel())->findAll(),
            'negara' => (new NegaraModel())->findAll(),
            'provinsi' => (new ProvinsiModel())->findAll(),
            'kota' => (new KotaKabupatenModel())->findAll(),
            'pendidikan' => (new PendidikanAkhirModel())->findAll(),
        ];
    }
}
