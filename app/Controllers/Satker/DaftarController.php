<?php

namespace App\Controllers\Satker;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class DaftarController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Order - SIGAP'
        ];

        return view('admin/daftar/index', $data);
    }

    public function daftar_orderan()
    {
        $orderModel = new OrderModel();

        $data = [
            'title' => 'Daftar Order Saya',
            'daftar_order' => $orderModel->findALL()
        ];

        return view('satker/daftar/orderan',$data);
    }
}