<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    
    function Index()
    {
        $pakets = Paket::with('user')->paginate(10);  

        return Inertia::render('Paket/Index', [
            'pakets' => $pakets
        ]);
    }

    public function create()
    {
        return Inertia::render('Paket/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
        ]);

        Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }


}
