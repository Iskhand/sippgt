<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Datalinting;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index(){
        $pekerja = Pekerja::get();

        $data['title'] = 'Rekap Data';
        $data['blok'] = 'Blok 1';
        $data['B1'] = $pekerja->where('kategori', 'BLOK 1');
        return view('pages.rekap.datarekap', $data);
    }
    public function index2(){
        $pekerja = Pekerja::get();

        $data['title'] = 'Rekap Data';
        $data['blok'] = 'Blok 2';
        $data['B1'] = $pekerja->where('kategori', 'BLOK 2');
        return view('pages.rekap.datarekap', $data);
    }
    public function index3(){
        $pekerja = Pekerja::get();

        $data['title'] = 'Rekap Data';
        $data['blok'] = 'Blok 3';
        $data['B1'] = $pekerja->where('kategori', 'BLOK 3');
        return view('pages.rekap.datarekap', $data);
    }
}
