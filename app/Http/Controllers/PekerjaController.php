<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use Illuminate\Http\Request;
use App\Http\Requests\StorePekerjaRequest;
use App\Http\Requests\UpdatePekerjaRequest;

class PekerjaController extends Controller
{
    
    public function index()
    {
        $data = Pekerja::all();
        return view('pages.pekerja.pekerja', compact('data'), ['title' => 'Data Pekerja', 'blok' => ' ']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahpekerja()
    {
        $lastNip = Pekerja::orderBy('nip', 'desc')->first();
        $number = $lastNip ? intval(substr($lastNip->nip, 2)) + 1 : 1;
        $newNip = 'PL' . str_pad($number, 4, '0', STR_PAD_LEFT);
        return view('pages.pekerja.tambahpekerja', [
            'title' => 'Data Pekerja',
            'blok' => 'Tambah Pekerja',
            'nip' => $newNip
        ]);
    }

    public function insertdata(Request $request){
        $request->validate([
            'nik' => 'required|numeric|digits_between:16,16|unique:pekerjas,nik',
            'telp' => 'required|numeric|digits_between:10,12',
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/',
            'kategori' => 'required'
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.digits_between' => 'NIK harus berisi 16 digit.',
            'nik.unique' => 'NIK yang Anda masukkan sudah terdaftar.',
            'telp.required' => 'Nomor telepon wajib diisi.',
            'telp.numeric' => 'Nomor telepon harus berupa angka.',
            'telp.max' => 'Nomor telepon harus berisi antara 10 sampai 12 digit.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama tidak boleh mengandung angka atau tanda baca.',
            'kategori.required' => 'Kategori harus dipilih.'
        ]);
        Pekerja::create($request->all());
        return redirect('pekerja')->with('toast_success', 'Data Pekerja Tersimpan');
    }

    public function tampildata($nip){
        $data = Pekerja::where('nip', $nip)->first();
        return view('pages.pekerja.tampildata', compact('data'), [
            'title' => 'Data Pekerja',
            'blok' => 'Kelola Data'
            ]);
    }

    public function updatedata(Request $request, $nip){
        $pekerja = Pekerja::where('nip', $nip)->first();
        $uniqueNikRule = 'required|numeric|digits_between:16,16|unique:pekerjas,nik,' . $pekerja->nip . ',nip';

        if ($request->nik == $pekerja->nik) {
            $uniqueNikRule = 'required|numeric|digits_between:16,16';
        }

        $request->validate([
            'nik' => $uniqueNikRule,
            'telp' => 'required|numeric|digits_between:10,12',
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/'
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.digits_between' => 'NIK harus berisi 16 digit.',
            'nik.unique' => 'NIK yang Anda masukkan sudah terdaftar.',
            'telp.required' => 'Nomor telepon wajib diisi.',
            'telp.numeric' => 'Nomor telepon harus berupa angka.',
            'telp.digits_between' => 'Nomor telepon harus berisi antara 10 sampai 12 digit.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama tidak boleh mengandung angka atau tanda baca.'
        ]);

        Pekerja::where('nip', $nip)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'kel_desa' => $request->kel_desa,
            'kec' => $request->kec,
            'kab_kota' => $request->kab_kota,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'masuk' => $request->masuk,
            'kategori' => $request->kategori,
        ]);

        return redirect('pekerja')->with('toast_success', 'Data Pekerja Terupdate');
    }

    public function deletedata($nip){
        Pekerja::where('nip', $nip)->delete();
        return redirect('pekerja')->with('toast_success', 'Data Pekerja Terhapus');
    }
}
