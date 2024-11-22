<?php

namespace App\Controllers\Superadmin;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    public function index(): string
    {
        $orderModel = new OrderModel();

        // Ambil semua data order
        $orders = $orderModel->findAll();

        $data = [
            'title' => 'Kelola Order - SIGAP',
            'orders' => $orders
        ];

        return view('superadmin/order/index', $data);
    }

    public function updateStatus($id, $status)
    {
        $orderModel = new OrderModel();

        // Validasi status
        $validStatuses = ['pending', 'process', 'done'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        // Update status
        $data = ['status' => $status];

        if ($orderModel->update($id, $data)) {
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }

    public function incoming()
    {
        $orderModel = new OrderModel();
        $data = [
            'title' => 'Pengajuan Masuk',
            'orders' => $orderModel->where('status !=', 'done')->findAll()
        ];
        return view('superadmin/order/incoming', $data);
    }

    public function done()
    {
        $orderModel = new OrderModel();
        $data = [
            'title' => 'Pengajuan Selesai',
            'orders' => $orderModel->where('status', 'done')->findAll()
        ];
        return view('superadmin/order/done', $data);
    }

    public function completed()
    {
        $orderModel = new OrderModel();
        $data = [
            'title' => 'Pengajuan Selesai',
            'orders' => $orderModel->where('status', 'done')->findAll()
        ];
        return view('superadmin/order/completed', $data);
    }
} 