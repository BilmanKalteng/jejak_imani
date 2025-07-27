<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Book;
use App\Models\Maskapai;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function Index()
    {
        $Book = Book::with('user', 'maskapai', 'paket')->paginate(10);

        $Book->getCollection()->transform(function ($item) {
            $item->harga_paket = $item->paket->harga_paket ?? 0;
            $item->harga_tiket = $item->maskapai->harga_tiket ?? 0;
            $item->harga_total = ($item->harga_paket + $item->harga_tiket) * $item->book_sheet;
            return $item;
        });

        return Inertia::render('Book/Index', [
            'book' => $Book
        ]);
    }


    public function create()
    {

        return Inertia::render('Book/Create',[
            'paket' => Paket::all(),
            'maskapai' => Maskapai::all(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_nama' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date|after_or_equal:today',
            'paket_id' => 'required|exists:pakets,id',
            'maskapai_id' => 'required|exists:maskapais,id',
            'book_sheet' => 'required|integer|min:1',
        ]);

        $maskapai = Maskapai::findOrFail($request->maskapai_id);

        $totalBooked = Book::where('maskapai_id', $request->maskapai_id)
            ->where('tanggal_berangkat', $request->tanggal_berangkat)
            ->sum('book_sheet');

        $sisaKursi = $maskapai->jumlah_sheet - $totalBooked;

        if ($request->book_sheet > $sisaKursi) {
            return back()->withErrors([
                'book_sheet' => "Kursi hanya tersisa $sisaKursi pada tanggal tersebut.",
            ])->withInput();
        }

        Book::create([
            'customer_nama' => $request->customer_nama,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'paket_id' => $request->paket_id,
            'maskapai_id' => $request->maskapai_id,
            'book_sheet' => $request->book_sheet,
            'user_id' => Auth::id()
        ]);


        return redirect()->route('book.index')->with('success', 'Booking berhasil dilakukan');
    }


    public function edit($id)
    {
        $book = Book::with('paket', 'maskapai')->findOrFail($id);
        $pakets = Paket::all();
        $maskapais = Maskapai::all();

        return Inertia::render('Book/Edit', [
            'book' => $book,
            'pakets' => $pakets,
            'maskapais' => $maskapais
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_nama' => 'required|string|max:255',
            'tanggal_berangkat' => 'required|date|after_or_equal:today',
            'paket_id' => 'required|exists:pakets,id',
            'maskapai_id' => 'required|exists:maskapais,id',
            'book_sheet' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($id);
        $maskapai = Maskapai::findOrFail($request->maskapai_id);


        $totalBooked = Book::where('maskapai_id', $request->maskapai_id)
            ->where('tanggal_berangkat', $request->tanggal_berangkat)
            ->where('id', '!=', $book->id)
            ->sum('book_sheet');

        $sisaKursi = $maskapai->jumlah_sheet - $totalBooked;

        if ($request->book_sheet > $sisaKursi) {
            return back()->withErrors([
                'book_sheet' => "Kursi hanya tersisa $sisaKursi pada tanggal tersebut.",
            ])->withInput();
        }

        $book->update([
            'customer_nama' => $request->customer_nama,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'paket_id' => $request->paket_id,
            'maskapai_id' => $request->maskapai_id,
            'book_sheet' => $request->book_sheet,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('book.index')->with('success', 'Data booking berhasil diperbarui');
    }



}
