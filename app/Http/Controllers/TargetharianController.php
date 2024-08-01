<?php

namespace App\Http\Controllers;

use App\Models\Datalinting;
use App\Models\Targetharian;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTargetharianRequest;
use App\Http\Requests\UpdateTargetharianRequest;
use App\Models\Pekerja;

class TargetharianController extends Controller
{
    public function tambahOtomatis()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        Targetharian::insert([
            'nama_blok' => 'Blok 1',
            'tr_merah' => '0',
            'tr_cokelat' => '0',
            'tr_hitam' => '0',
            'tr_jawas' => '0',
            'tr_jumlah' => '0',
            'tanggal' => $tanggal,
        ]);

        Targetharian::insert([
            'nama_blok' => 'Blok 2',
            'tr_merah' => '0',
            'tr_cokelat' => '0',
            'tr_hitam' => '0',
            'tr_jawas' => '0',
            'tr_jumlah' => '0',
            'tanggal' => $tanggal,
        ]);

        Targetharian::insert([
            'nama_blok' => 'Blok 3',
            'tr_merah' => '0',
            'tr_cokelat' => '0',
            'tr_hitam' => '0',
            'tr_jawas' => '0',
            'tr_jumlah' => '0',
            'tanggal' => $tanggal,
        ]);
    }
    public function target()
    {
        date_default_timezone_set('Asia/Jakarta');
        $p1 = Pekerja::where('kategori', 'Blok 1')->pluck('nip');
        $p2 = Pekerja::where('kategori', 'Blok 2')->pluck('nip');
        $p3 = Pekerja::where('kategori', 'Blok 3')->pluck('nip');
        $tanggal = date('Y-m-d');
        $checkData = Targetharian::where('tanggal', $tanggal)->exists();

        if (!$checkData) {
            
            $this->tambahOtomatis();
            
            return redirect('target');

        } else {
            return view('pages.target.index', [
                'title' => 'Data Target',
                'blok' => ' Progres',
                'data' => Targetharian::whereDate('tanggal', $tanggal)->get(),
                // kategori Blok 1
                'jumpek1' => Pekerja::where('kategori', 'Blok 1')->count(),
                'tar1' => Targetharian::where('nama_blok', 'Blok 1')->where('tanggal', date('Y-m-d'))->sum('tr_jumlah'),
                'jum1' => Datalinting::where('tanggal', $tanggal)->whereIn('nip', $p1)->sum('jumlah'),
                // kategori Blok 2
                'jumpek2' => Pekerja::where('kategori', 'Blok 2')->count(),
                'tar2' => Targetharian::where('nama_blok', 'Blok 2')->where('tanggal', date('Y-m-d'))->sum('tr_jumlah'),
                'jum2' => Datalinting::where('tanggal', $tanggal)->whereIn('nip', $p2)->sum('jumlah'),
                // kategori Blok 3
                'jumpek3' => Pekerja::where('kategori', 'Blok 3')->count(),
                'tar3' => Targetharian::where('nama_blok', 'Blok 3')->where('tanggal', date('Y-m-d'))->sum('tr_jumlah'),
                'jum3' => Datalinting::where('tanggal', $tanggal)->whereIn('nip', $p3)->sum('jumlah'),
            ]);
        }

        
    }
    public function viewtarget()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $checkData = Targetharian::where('tanggal', $tanggal)->exists();

        if (!$checkData) {
            
            $this->tambahOtomatis();
            
            return redirect('target');

        } else {
            $data = Targetharian::whereDate('tanggal', $tanggal)->get();
            return view('pages.target.target', compact('data'), ['title' => 'Data Target', 'blok' => ' Panel Target']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getData($id)
    {
        $data = Targetharian::find($id);
        return view('pages.target.kelolatarget', compact('data'), ['title' => 'Data Target', 'blok' => ' Panel Target']);
    }

    public function saveData(Request $request, $id)
    {
        $total = $request->tr_merah + $request->tr_cokelat + $request->tr_hitam + $request->tr_jawas;

        Targetharian::where('id', $id)->update([
            'tr_merah' => $request->tr_merah,
            'tr_cokelat' => $request->tr_cokelat,
            'tr_hitam' => $request->tr_hitam,
            'tr_jawas' => $request->tr_jawas,
            'tr_jumlah' => $total,
        ]);
        return redirect('target')->with('toast_success', 'Target Harian Terupdate');
    }

    }
