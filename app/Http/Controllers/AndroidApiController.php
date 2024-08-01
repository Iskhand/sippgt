<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Datalinting;
use App\Models\Targetharian;
use Illuminate\Http\Request;

class AndroidApiController extends Controller
{
    public function pekerja(){
        
        return response()->json([
            'datapek' => Pekerja::all()
        ]);
    }

    public function datalin(){
        
        $tanggal = date('Y-m-d', strtotime('-2 day'));
        return response()->json([
            'datalin' => Datalinting::where('tanggal', $tanggal)->get(),
        ]);
    }

    public function target(){
        $tanggal = date('Y-m-d');
        $p1 = Pekerja::where('kategori', 'Blok 1')->pluck('nip');
        $jumpek =Pekerja::where('kategori', 'Blok 1')->count('nip');
        $in = Datalinting::where('tanggal', $tanggal)->whereIn('nip', $p1)->count('jumlah');
        $res1 = $jumpek -$in;
        return response()->json([
            'target' => [
                'tar1' => Targetharian::where('nama_blok', 'Blok 1')->where('tanggal', date('Y-m-d'))->sum('tr_jumlah'),
                'jum1' => Datalinting::where('tanggal', $tanggal)->whereIn('nip', $p1)->sum('jumlah'),
                'jumpek1' => Pekerja::where('kategori', 'Blok 1')->count(),
                // jumlah yang sudah dan belum diinput
                'input' => Datalinting::where('tanggal', $tanggal)->whereIn('nip', $p1)->count('jumlah'),
                'none' => $res1,
            ]
        ]);
    }
}
