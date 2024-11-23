<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    // Menampilkan daftar pengajuan
    public function index()
    {
        $title = 'Daftar Pengajuan';
        // Ambil data pengajuan dengan status "pending"
        $orders = $this->orderModel->where('status', 'pending')->findAll();

        // Kirim data ke view
        $data = [
            'orders' => $orders,
        ];

        return view('admin/order/incoming.php', $data);
    }

    // Menyetujui pengajuan dan mengirimkan ke halaman order Super Admin
    public function approve($id)
    {
        // Cari data order berdasarkan ID
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
        }

        // Update status menjadi "pending" (status awal di halaman Super Admin)
        $this->orderModel->update($id, ['status' => 'process']);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pengajuan berhasil disetujui dan dikirim ke Super Admin.');
    }

    // Menolak pengajuan
    public function reject($id)
    {
        // Cari data order berdasarkan ID
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
        }

        // Update status menjadi "ditolak"
        $this->orderModel->update($id, ['status' => 'ditolak']);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function incoming()
    {
        $incomingOrders = $this->orderModel->where('status', 'pengajuan')->findAll();
        return view('admin/order/incoming', ['incomingOrders' => $incomingOrders]);
    }

    public function rejected()
    {
        $rejectedOrders = $this->orderModel->where('status', 'ditolak')->findAll();
        return view('admin/order/rejected', ['rejectedOrders' => $rejectedOrders]);
    }

    public function process()
    {
        $orders = $this->orderModel->whereIn('status', ['process', 'done'])->findAll();
        return view('admin/order/process', ['orders' => $orders]);
    }
}
