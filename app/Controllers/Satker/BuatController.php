<?php

namespace App\Controllers\Satker;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class BuatController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Order - SIGAP'
        ];

        return view('satker/order/index', $data);
    }

    public function create()
    {
        // Ambil data dari form
        $data = [
            'judul_order' => $this->request->getPost('judul_order'),
            'jenis' => $this->request->getPost('jenis'),
            'kategori' => $this->request->getPost('kategori'),
            'detail' => $this->request->getPost('detail'),
        ];

        // Handle file upload
        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file');
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName); // Atau sesuaikan direktori

            $data['file'] = $fileName; // Simpan nama file ke dalam data
        }

        // Simpan data ke database
        $orderModel = new OrderModel();
        if ($orderModel->insert($data)) {
            session()->setFlashdata('success', 'Order berhasil dibuat!');
        } else {
            session()->setFlashdata('error', 'Gagal membuat order. Silakan coba lagi.');
        }

        // Kembali ke halaman buat order
        return redirect()->to(base_url('order'));
    }
}
