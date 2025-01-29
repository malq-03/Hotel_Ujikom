<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\room;

class AdminController extends Controller
{
    public function index () {
        $room = room::all();
        if (Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user')
            {
                return view('home.index', compact('room'));
            }else if ($usertype == 'admin'){
                return view ('admin.index');
            }else {
                return redirect()->back();
            }
        }
    }

    public function home() {
        $room = room::all();
        return view('home.index', compact('room'));
    }

    public function create_kamar() {
        return view('admin.create_kamar');
    }

    public function tambah_kamar(Request $request) {
        $data = new room;
        $data -> nama_kamar = $request->kamar;
        $data -> deskripsi = $request->desk;
        $data -> harga = $request->harga;
        $data -> wifi = $request->wifi;
        $data -> type_kamar = $request->type;
        $gambar=$request->gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar->move('room',$gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();

        return redirect()->back()->with('success', 'Kamar Berhasil ditambahkan');
    }

    public function data_kamar() {
        $data = room::all();
        return view('admin.data_kamar', compact('data'));
    }

    public function update_kamar($id) {
        $data = room::find($id);
        return view('admin.update_kamar', compact('data'));
    }

    public function edit_kamar(Request $request, $id) {
        $data = room::find($id);
        $data -> nama_kamar = $request->kamar;
        $data -> deskripsi = $request->desk;
        $data -> harga = $request->harga;
        $data -> wifi = $request->wifi;
        $data -> type_kamar = $request->type;
        $gambar=$request->gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar->move('room',$gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();

        return redirect('data_kamar')->with('success', 'Kamar Berhasil di update');
    }

    public function delete_kamar($id) {
        $data = room::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Kamar Berhasil dihapus');
    }    
    
    public function detail_kamar() {
        $room = room::all();
        return view('home.detail_kamar', compact('room'));
    }
}
