<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminMandorController extends Controller
{
    public function mandor()
    {
        $data = User::where('kategori', 'mandor')->get();
        return view('pages.mandor.tampil', compact('data'), ['title' => 'Data Mandor', 'blok' => ' ']);
    }

    public function updatemandor(Request $request, $id)
    {
        if (empty($request->password)) {
            User::where('id', $id)->update([
                'name' => $request->nama,
                'email' => $request->email,
            ]);
        } else {
            $pass = Hash::make($request->password);
            User::where('id', $id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $pass,
            ]);
        }
       return back()->with('toast_success', 'Data Telah Terupdate');
    }

}
