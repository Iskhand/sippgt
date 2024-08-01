<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mandor;
use App\Models\Pekerja;
use App\Models\Datalinting;
use App\Models\Targetharian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreMandorRequest;
use App\Http\Requests\UpdateMandorRequest;


class MandorController extends Controller
{
    
    // sesi mandor 1
    public function mandor1()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $target = Targetharian::where('tanggal' , $now)->where('nama_blok', 'Blok 1')->get();
        $tarToday = $target->sum('tr_jumlah');
        $tarM = $target->sum('tr_merah');
        $tarH = $target->sum('tr_hitam');
        $tarC = $target->sum('tr_cokelat');
        $tarJ = $target->sum('tr_jawas');
        $pekerja = Pekerja::where('kategori', 'Blok 1')->pluck('nip');
        $datalinting = Datalinting::where('tanggal', $now)->whereIn('nip', $pekerja)->get();
        $linting = $datalinting->sum('jumlah');
        $lintingM = $datalinting->sum('lt_merah');
        $lintingH = $datalinting->sum('lt_hitam');
        $lintingC = $datalinting->sum('lt_cokelat');
        $lintingJ = $datalinting->sum('lt_jawas');

        $sisa = $tarToday - $linting;
        $sisaM = $tarM - $lintingM;
        $sisaH = $tarH - $lintingH;
        $sisaC = $tarC - $lintingC;
        $sisaJ = $tarJ - $lintingJ;

        $data['title'] = 'Overview';

        $data['targethariini'] = $tarToday;
        $data['selesai'] = $linting;
        $data['sisa'] = $sisa;
        
        $data['tarMerah'] = $tarM;
        $data['doneMerah'] = $lintingM;
        $data['sisaMerah'] = $sisaM;

        $data['tarHitam'] = $tarH;
        $data['doneHitam'] = $lintingH;
        $data['sisaHitam'] = $sisaH;

        $data['tarCokelat'] = $tarC;
        $data['doneCokelat'] = $lintingC;
        $data['sisaCokelat'] = $sisaC;

        $data['tarJawas'] = $tarJ;
        $data['doneJawas'] = $lintingJ;
        $data['sisaJawas'] = $sisaJ;
        return view('pagesMandor.section.dashboard',$data);
    }
    public function list1()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        $pekerja = Pekerja::where('kategori', 'BLOK 1')->get();
        $datalinting = Datalinting::where('tanggal', $now)->get();

        $data['title'] = 'Data Pekerja';
        $data['pekerja'] = $pekerja;
        $data['linting'] = $datalinting;
        return view('pagesMandor.section.listdata', $data);
    }

    public function view1()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        $pekerja = Pekerja::where('kategori', 'BLOK 1')->get();
        $datalinting = Datalinting::where('tanggal', $now)->get();

        $data['title'] = 'Data Linting';
        $data['pekerja'] = $pekerja;
        $data['linting'] = $datalinting;
        return view('pagesMandor.section.viewdata', $data);
    }

    public function save1(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $total = $request->lt_merah + $request->lt_cokelat + $request->lt_hitam + $request->lt_jawas;

        Datalinting::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'lt_merah' => $request->lt_merah,
            'lt_cokelat' => $request->lt_cokelat,
            'lt_hitam' => $request->lt_hitam,
            'lt_jawas' => $request->lt_jawas,
            'jumlah' => $total,
            'tanggal' => $now
        ]);
        return redirect('/list1')->with('toast_success', 'Data Tersimpan');
    }
    // sesi mandor 2
    public function mandor2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $target = Targetharian::where('tanggal' , $now)->where('nama_blok', 'Blok 2')->get();
        $tarToday = $target->sum('tr_jumlah');
        $tarM = $target->sum('tr_merah');
        $tarH = $target->sum('tr_hitam');
        $tarC = $target->sum('tr_cokelat');
        $tarJ = $target->sum('tr_jawas');
        $pekerja = Pekerja::where('kategori', 'Blok 2')->pluck('nip');
        $datalinting = Datalinting::where('tanggal', $now)->whereIn('nip', $pekerja)->get();
        $linting = $datalinting->sum('jumlah');
        $lintingM = $datalinting->sum('lt_merah');
        $lintingH = $datalinting->sum('lt_hitam');
        $lintingC = $datalinting->sum('lt_cokelat');
        $lintingJ = $datalinting->sum('lt_jawas');

        $sisa = $tarToday - $linting;
        $sisaM = $tarM - $lintingM;
        $sisaH = $tarH - $lintingH;
        $sisaC = $tarC - $lintingC;
        $sisaJ = $tarJ - $lintingJ;

        $data['title'] = 'Overview';

        $data['targethariini'] = $tarToday;
        $data['selesai'] = $linting;
        $data['sisa'] = $sisa;
        
        $data['tarMerah'] = $tarM;
        $data['doneMerah'] = $lintingM;
        $data['sisaMerah'] = $sisaM;

        $data['tarHitam'] = $tarH;
        $data['doneHitam'] = $lintingH;
        $data['sisaHitam'] = $sisaH;

        $data['tarCokelat'] = $tarC;
        $data['doneCokelat'] = $lintingC;
        $data['sisaCokelat'] = $sisaC;

        $data['tarJawas'] = $tarJ;
        $data['doneJawas'] = $lintingJ;
        $data['sisaJawas'] = $sisaJ;
        return view('pagesMandor.section.dashboard',$data);
    }
    public function list2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        $pekerja = Pekerja::where('kategori', 'BLOK 2')->get();
        $datalinting = Datalinting::where('tanggal', $now)->get();

        $data['title'] = 'Data Pekerja';
        $data['pekerja'] = $pekerja;
        $data['linting'] = $datalinting;
        return view('pagesMandor.section.listdata', $data);
    }

    public function view2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        $pekerja = Pekerja::where('kategori', 'BLOK 2')->get();
        $datalinting = Datalinting::where('tanggal', $now)->get();

        $data['title'] = 'Data Linting';
        $data['pekerja'] = $pekerja;
        $data['linting'] = $datalinting;
        return view('pagesMandor.section.viewdata', $data);
    }

    public function save2(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $total = $request->lt_merah + $request->lt_cokelat + $request->lt_hitam + $request->lt_jawas;

        Datalinting::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'lt_merah' => $request->lt_merah,
            'lt_cokelat' => $request->lt_cokelat,
            'lt_hitam' => $request->lt_hitam,
            'lt_jawas' => $request->lt_jawas,
            'jumlah' => $total,
            'tanggal' => $now
        ]);
        return redirect('/list2')->with('toast_success', 'Data Tersimpan');
    }
    // sesi mandor 3
    public function mandor3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $target = Targetharian::where('tanggal' , $now)->where('nama_blok', 'Blok 3')->get();
        $tarToday = $target->sum('tr_jumlah');
        $tarM = $target->sum('tr_merah');
        $tarH = $target->sum('tr_hitam');
        $tarC = $target->sum('tr_cokelat');
        $tarJ = $target->sum('tr_jawas');
        $pekerja = Pekerja::where('kategori', 'Blok 3')->pluck('nip');
        $datalinting = Datalinting::where('tanggal', $now)->whereIn('nip', $pekerja)->get();
        $linting = $datalinting->sum('jumlah');
        $lintingM = $datalinting->sum('lt_merah');
        $lintingH = $datalinting->sum('lt_hitam');
        $lintingC = $datalinting->sum('lt_cokelat');
        $lintingJ = $datalinting->sum('lt_jawas');

        $sisa = $tarToday - $linting;
        $sisaM = $tarM - $lintingM;
        $sisaH = $tarH - $lintingH;
        $sisaC = $tarC - $lintingC;
        $sisaJ = $tarJ - $lintingJ;

        $data['title'] = 'Overview';

        $data['targethariini'] = $tarToday;
        $data['selesai'] = $linting;
        $data['sisa'] = $sisa;
        
        $data['tarMerah'] = $tarM;
        $data['doneMerah'] = $lintingM;
        $data['sisaMerah'] = $sisaM;

        $data['tarHitam'] = $tarH;
        $data['doneHitam'] = $lintingH;
        $data['sisaHitam'] = $sisaH;

        $data['tarCokelat'] = $tarC;
        $data['doneCokelat'] = $lintingC;
        $data['sisaCokelat'] = $sisaC;

        $data['tarJawas'] = $tarJ;
        $data['doneJawas'] = $lintingJ;
        $data['sisaJawas'] = $sisaJ;
        return view('pagesMandor.section.dashboard',$data);
    }
    public function list3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        $pekerja = Pekerja::where('kategori', 'BLOK 3')->get();
        $datalinting = Datalinting::where('tanggal', $now)->get();

        $data['title'] = 'Data Pekerja';
        $data['pekerja'] = $pekerja;
        $data['linting'] = $datalinting;
        return view('pagesMandor.section.listdata', $data);
    }

    public function view3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        $pekerja = Pekerja::where('kategori', 'BLOK 3')->get();
        $datalinting = Datalinting::where('tanggal', $now)->get();

        $data['title'] = 'Data Linting';
        $data['pekerja'] = $pekerja;
        $data['linting'] = $datalinting;
        return view('pagesMandor.section.viewdata', $data);
    }

    public function save3(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $total = $request->lt_merah + $request->lt_cokelat + $request->lt_hitam + $request->lt_jawas;

        Datalinting::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'lt_merah' => $request->lt_merah,
            'lt_cokelat' => $request->lt_cokelat,
            'lt_hitam' => $request->lt_hitam,
            'lt_jawas' => $request->lt_jawas,
            'jumlah' => $total,
            'tanggal' => $now
        ]);
        return redirect('/list3')->with('toast_success', 'Data Tersimpan');
    }
}
