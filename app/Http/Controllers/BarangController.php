<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::latest()->paginate();
        return view('barang.index',[
            'title'=>'Daftar Barang'
        ], compact('barang'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.add',[
            'title' => 'Buat Daftar barang Baru'
        ]);
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
            'nama_barang' => ['required','string'],
            'kode_barang' => ['required','string'],
            'harga_barang' => ['required'],
            'qty_barang' => ['required','string']
            
        ]);
        $input = $request->all();

        Barang::create($input);
        return redirect()->route('barang.index')
        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barang.show',[
            'title' => 'Lihat Data Barang',compact('barang')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
       return view('barang.edit',[
            'title' => 'Update Daftar barang lama',compact('barang')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
      {
        $request->validate([
            'nama_barang' => ['required','string'],
            'kode_barang' => ['required','string'],
            'harga_barang' => ['required'],
            'qty_barang' => ['required','string']
        ]);

        $input=$request->all();
        $barang->update($input);

        return redirect()->route('barang.index')
        ->with('success','Data Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')
        ->with('success','Berhasil dihapus');
    }
}
