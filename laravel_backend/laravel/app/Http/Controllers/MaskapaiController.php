<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Maskapai;
use Illuminate\Support\Facades\Auth;

class MaskapaiController extends Controller
{
    
    function Index()
    {
        $maskapai = Maskapai::with('user')->paginate(10);    

        return Inertia::render('Maskapai/Index', [
            'maskapai' => $maskapai
        ]);
    }

    public function create()
    {
        return Inertia::render('Maskapai/Create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'nama_maskapai' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'jumlah_sheet' => 'required|numeric',
        ]);

        Maskapai::create([
            'nama_maskapai' => $request->nama_maskapai,
            'harga_tiket' => $request->harga_tiket,
            'jumlah_sheet' => $request->jumlah_sheet,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('maskapai.index')->with('success', 'Paket berhasil ditambahkan.');
    }



}
