<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barangs;
use App\Models\KodeBarang;

class DashboardController extends Controller
{
    private $barang;
    private $kode_barang;

    public function __construct()
    {
        $this->barang = new Barangs();
        $this->kode_barang = new KodeBarang();
    }
    public function dashboard()
    {
        $data = $this->barang->all();
        $title = 'Dashboard';
        return view('pages/dashboard', ['title' => $title, 'barang' => $data]);
    }
    public function kategori()
    {
        $title = 'Kategori';
        return view('pages/dashboard_kategori', ['title' => $title]);
    }

    public function barang()
    {
        $data = $this->barang->all();
        $title = 'Barangs';
        return view('pages/dashboard_barangs', ['title' => $title, 'barang' => $data]);
    }
    public function pageInputBarang()
    {
        $title = 'Input Barang';
        $data = $this->kode_barang->all();
        return view('pages/dashboard_input_barang', ['title' => $title, 'kode_barang' => $data]);
    }
    public function pageLaporan()
    {
        $title = 'Laporan';
        return view('pages/dashboard_laporan', ['title' => $title]);
    }
    public function pageUsers()
    {
        $title = 'Users';
        return view('pages/dashboard_users', ['title' => $title]);
    }
    public function logout()
    {
        Auth::logout();
        // Redirect to the login page or any desired location
        return redirect('/login');
    }
}
