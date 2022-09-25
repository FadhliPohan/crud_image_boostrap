<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate();

        return view('transaksi.index', [
            'title' => 'Transaksi'
        ], compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('transaksi.add',['title'=>'transaksi']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => ['required','string'],
            'nama_pembeli' => ['required','string'],
            'nama_penjual' => ['required'],
            'id_barang' => ['required'],
            'jumlah_barang' => ['required'],
            'total_barang' => ['required']
            
        ]);
        $input = $request->all();

       
        Transaksi::create($input);
        return redirect()->route('transaksi.index')
        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
          return view('transaksi.show',compact('transaksi'),[
            'title' => 'Lihat Data transaksi'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
          return view('transaksi.edit',compact('transaksi'),[
            'title' => 'Update Daftar transaksi lama'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kode_transaksi' => ['required','string'],
            'nama_pembeli' => ['required','string'],
            'nama_penjual' => ['required'],
            'id_barang' => ['required'],
            'jumlah_barang' => ['required'],
            'total_barang' => ['required']
        ]);

        $input=$request->all();

        $transaksi->update($input);
        return redirect()->route('transaksi.index')
        ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')
        ->with('success','Berhasil dihapus');
    }
}
