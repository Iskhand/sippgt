<?php

namespace App\Http\Controllers;

use App\Models\Datalinting;
use App\Http\Requests\StoreDatalintingRequest;
use App\Http\Requests\UpdateDatalintingRequest;
use App\Models\Pekerja;
use Illuminate\Http\Request;

class DatalintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
       return redirect()->route('datalinting-blok1');
    }

    public function blok1()
    {
        date_default_timezone_set('Asia/Jakarta');
        $db = Datalinting::get();
        $data = Pekerja::where('kategori', 'Blok 1')->get();
        $jumpek = $data->count('nip');
        $jumlin = Datalinting::whereIn('nip', Pekerja::where('kategori', 'Blok 1')->pluck('nip'))->get();
        return view('pages.datalinting.tampildata', [
            'title' => 'Data Linting', 
            'blok' => 'Blok 1', 
            'data' => $data,
            'jumpek' => $jumpek,
            'jumlin' => $jumlin,
            'dblinting'=> $db
        ]);
    }

    public function blok2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $db = Datalinting::get();
        $data = Pekerja::where('kategori', 'Blok 2')->get();
        $jumpek = $data->count('nip');
        $jumlin = Datalinting::whereIn('nip', Pekerja::where('kategori', 'Blok 2')->pluck('nip'))->get();
        return view('pages.datalinting.tampildata', [
            'title' => 'Data Linting', 
            'blok' => 'Blok 2', 
            'data' => $data,
            'jumpek' => $jumpek,
            'jumlin' => $jumlin,
            'dblinting'=> $db
        ]);
    }

    public function blok3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $db = Datalinting::get();
        $data = Pekerja::where('kategori', 'Blok 3')->get();
        $jumpek = $data->count('nip');
        $jumlin = Datalinting::whereIn('nip', Pekerja::where('kategori', 'Blok 3')->pluck('nip'))->get();
        return view('pages.datalinting.tampildata', [
            'title' => 'Data Linting', 
            'blok' => 'Blok 3', 
            'data' => $data,
            'jumpek' => $jumpek,
            'jumlin' => $jumlin,
            'dblinting'=> $db
        ]);
    }
    public function tampildata($id_linting){
        $data = Datalinting::where('id_linting', $id_linting)->first();
        return view('pages.datalinting.editlinting', compact('data'), [
            'title' => 'Data Pekerja',
            'blok' => 'Kelola Data'
            ]);
    }
    public function savelinting(Request $request, $id_linting){
        $total = $request->lt_merah + $request->lt_cokelat + $request->lt_hitam + $request->lt_jawas;
        Datalinting::where('id_linting', $id_linting)->update([
            'lt_merah' => $request->lt_merah,
            'lt_cokelat' => $request->lt_cokelat,
            'lt_hitam' => $request->lt_hitam,
            'lt_jawas' => $request->lt_jawas,
            'jumlah' => $total,
        ]);
        return back()->with('toast_success', 'Data Tersimpan');
    }
}
