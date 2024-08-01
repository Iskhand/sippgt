<?php

namespace App\Http\Controllers;

use App\Models\Datalinting;
use App\Models\Pekerja;
use App\Models\Targetharian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('login',['title' => 'Login Mandor', 'key' => 'Mandor']);
        
    }
    function indexadmin(){
        return view('login',['title' => 'Login Admin', 'key' => 'Admin']);
    }
    function loginadmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]
        ,[
            'email.required' => 'Email Wajib diisi.',
            'email.email' => 'Harus berupa alamat email yang valid.',
            'password.required' => 'Password Wajib diisi.',
        ]
    );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
            'kategori' => 'admin'
        ];

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        }else{
            return back()->with('error', 'Email atau Password Salah');
        }
    }
    function login(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]
        ,[
            'email.required' => 'Email Wajib diisi.',
            'email.email' => 'Harus berupa alamat email yang valid.',
            'password.required' => 'Password Wajib diisi.',
        ]
    );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
            'kategori' => 'mandor'
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'mandorb1'){
                return redirect('/mandor1');
            }elseif(Auth::user()->role == 'mandorb2'){
                return redirect('/mandor2');
            }elseif(Auth::user()->role == 'mandorb3'){
                return redirect('/mandor3');
            }else{
                echo ('Mohon Maaf Akun Ini Diluar Jangkauan Kami !');
            }
        }else{
            return back()->with('error', 'Email atau Password Salah');
        }
    }
    function logout(){
        if(Auth::user()->role == 'admin'){
            Auth::logout();
            return redirect('/');
        }else{
            Auth::logout();
            return redirect('/mandor');
        }
    }

    // menambahakan data pada tabel target
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

    function dashboard(){
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $checkData = Targetharian::where('tanggal', $tanggal)->exists();

        if (!$checkData) {
            
            $this->tambahOtomatis();
            
            return redirect('/dashboard');

        } else {

            $bln=([
                'jan'=>1,
                'feb'=>2,
                'mar'=>3,
                'apr'=>4,
                'mei'=>5,
                'jun'=>6,
                'jul'=>7,
                'ags'=>8,
                'sep'=>9,
                'okt'=>10,
                'nov'=>11,
                'des'=>12,
            ]);
            
            $now = date('Y-m-d');
            $tahun = date('Y');
            $bulan = date('m');
            // $bulan = date('m',strtotime("-1 month"));
            // $bulan = 04;
            // Database
            $pekerja = Pekerja::get();
            $datalinting = Datalinting::get();
            $LintingBulanan = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bulan])->get();
            $Linjan = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['jan']])->get();
            $Linfeb = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['feb']])->get();
            $Linmar = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['mar']])->get();
            $Linapr = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['apr']])->get();
            $Linmei = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['mei']])->get();
            $Linjun = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['jun']])->get();
            $Linjul = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['jul']])->get();
            $Linags = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['ags']])->get();
            $Linsep = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['sep']])->get();
            $Linokt = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['okt']])->get();
            $Linnov = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['nov']])->get();
            $Lindes = Datalinting::whereRaw('MONTH(tanggal) = ?',[$bln['des']])->get();


            $blok1 = $pekerja->where('kategori', 'BLOK 1');
            $blok2 = $pekerja->where('kategori', 'BLOK 2');
            $blok3 = $pekerja->where('kategori', 'BLOK 3');

            $LintingSekarang = $datalinting->where('tanggal', $now);

            $data['title'] = "Dashboard";
            $data['blok'] = ".";
            $data['JumlahPekerja']=$pekerja->count('nip');
            $data['Blok1']=$blok1->count();
            $data['Blok2']=$blok2->count();
            $data['Blok3']=$blok3->count();

            $data['chartLinting'] = $LintingSekarang;
            $data['Linting1'] = $LintingSekarang->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            
            // Data Bulanan Blok 1
            $data['B1jan'] = $Linjan->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1feb'] = $Linfeb->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1mar'] = $Linmar->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1apr'] = $Linapr->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1mei'] = $Linmei->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1jun'] = $Linjun->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1jul'] = $Linjul->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1ags'] = $Linags->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1sep'] = $Linsep->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1okt'] = $Linokt->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1nov'] = $Linnov->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');
            $data['B1des'] = $Lindes->whereIn('nip', $blok1->pluck('nip'))->sum('jumlah');

            // Data Bulanan Blok 2
            $data['B2jan'] = $Linjan->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2feb'] = $Linfeb->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2mar'] = $Linmar->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2apr'] = $Linapr->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2mei'] = $Linmei->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2jun'] = $Linjun->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2jul'] = $Linjul->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2ags'] = $Linags->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2sep'] = $Linsep->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2okt'] = $Linokt->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2nov'] = $Linnov->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');
            $data['B2des'] = $Lindes->whereIn('nip', $blok2->pluck('nip'))->sum('jumlah');

            // Data Bulanan Blok 3
            $data['B3jan'] = $Linjan->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3feb'] = $Linfeb->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3mar'] = $Linmar->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3apr'] = $Linapr->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3mei'] = $Linmei->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3jun'] = $Linjun->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3jul'] = $Linjul->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3ags'] = $Linags->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3sep'] = $Linsep->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3okt'] = $Linokt->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3nov'] = $Linnov->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');
            $data['B3des'] = $Lindes->whereIn('nip', $blok3->pluck('nip'))->sum('jumlah');

            return view('pages.dashboard', $data);

        }
    }
    function wellcome(){
        if(Auth::user()->role == 'admin'){
            return redirect('/dashboard');
        }elseif(Auth::user()->role == 'mandorb1'){
            return redirect('/mandor1');
        }elseif(Auth::user()->role == 'mandorb2'){
            return redirect('/mandor2');
        }elseif(Auth::user()->role == 'mandorb3'){
            return redirect('/mandor3');
        }
    }
}
