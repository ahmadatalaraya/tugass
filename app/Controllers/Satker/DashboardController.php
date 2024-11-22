<?php

namespace App\Controllers\Satker;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $orderModel = new OrderModel();
        
        $data = [
            'title' => 'Dashboard Satker',
            'waitingCount' => $orderModel->where('status', 'pending')->countAllResults(),
            'processCount' => $orderModel->where('status', 'process')->countAllResults(),
            'completedCount' => $orderModel->where('status', 'done')->countAllResults(),
        ];

        return view('satker/dashboard/index', $data);
    }
}
