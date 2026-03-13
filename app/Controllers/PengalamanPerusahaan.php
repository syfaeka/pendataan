<?php

namespace App\Controllers;

use App\Models\PengalamanPerusahaanModel;

use App\Models\KategoriPekerjaanModel;
use App\Models\KbliModel;
use App\Models\NegaraModel;
use App\Models\ProvinsiModel;
use App\Models\KotaKabupatenModel;
use App\Models\JenisInstansiModel;
use App\Models\NamaInstansiModel;
use App\Models\SatuanKerjaModel;

class PengalamanPerusahaan extends BaseController
{
    protected $pengalamanModel;

    public function __construct()
    {
        $this->pengalamanModel = new PengalamanPerusahaanModel();
    }

    public function index()
    {
        $data['pengalaman'] = $this->pengalamanModel
            ->select('pengalaman_perusahaan.*, 
                      kategori_pekerjaan.name as kategori_name, 
                      nama_instansi.name as instansi_name,
                      jenis_instansi.name as jenis_instansi_name')
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id = pengalaman_perusahaan.id_kategori_pekerjaan', 'left')
            ->join('nama_instansi', 'nama_instansi.id = pengalaman_perusahaan.id_nama_instansi', 'left')
            ->join('jenis_instansi', 'jenis_instansi.id = pengalaman_perusahaan.id_jenis_instansi', 'left')
            ->findAll();

        return view('pengalaman/index', $data);
    }

    public function create()
    {
        return view('pengalaman/form', $this->getFormData());
    }

    public function store()
    {
        $rules = [
            'nama_kontrak' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pengalamanModel->insert($this->request->getPost());

        return redirect()->to(base_url('pengalaman'))->with('success', 'Data Pengalaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->getFormData();
        $data['pengalaman'] = $this->pengalamanModel->find($id);

        if (!$data['pengalaman']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('pengalaman/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_kontrak' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pengalamanModel->update($id, $this->request->getPost());

        return redirect()->to(base_url('pengalaman'))->with('success', 'Data Pengalaman berhasil diupdate.');
    }

    public function delete($id)
    {
        if (!$this->pengalamanModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->pengalamanModel->delete($id);

        return redirect()->to(base_url('pengalaman'))->with('success', 'Data Pengalaman berhasil dihapus.');
    }


    private function getFormData()
    {
        return [
            'kategori'       => (new KategoriPekerjaanModel())->findAll(),
            'kbli'           => (new KbliModel())->findAll(),
            'negara'         => (new NegaraModel())->findAll(),
            'provinsi'       => (new ProvinsiModel())->findAll(),
            'kota'           => (new KotaKabupatenModel())->findAll(),
            'jenis_instansi' => (new JenisInstansiModel())->findAll(),
            'nama_instansi'  => (new NamaInstansiModel())->findAll(),
            'satuan_kerja'   => (new SatuanKerjaModel())->findAll(),
        ];
    }
}
