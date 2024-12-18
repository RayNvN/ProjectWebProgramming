<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Fungsi untuk menampilkan dashboard admin
    public function index()
    {
        // Memanggil view yang ada di resources/views/auth/dashboard.blade.php
        return view('admin.dashboard');
    }
}
