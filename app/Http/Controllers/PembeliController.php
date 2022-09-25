<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = Pembeli::latest()->paginate();
        return view('pembeli.index', [
            'title' => 'Daftar Pembeli'
        ], compact('pembeli'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.index',[
            'title' => 'Buat Daftar Pembeli Baru'
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
            'nama_pembeli' => ['required','string'],
            'alamat_pembeli' => ['required','string'],
            'foto_pembeli' => ['required'],
            'NIK' => ['required'],
            'jk_pembeli' => ['required','string']
            
        ]);
        $input = $request->all();

        if($foto = $request->file('foto_pembeli')){
            $penggunaimage = date('YmdHis') .".".
            $foto->getClientOriginalExtension();
            //extention menyimpan
            $foto->storeAs('public/foto',$penggunaimage);
            //extention ke database
            $input[$foto] ="$penggunaimage";
        }
        Pembeli::create($input);
        return redirect()->route('pembeli.index')
        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show(Pembeli $pembeli)
    {
        return view('pembeli.show',[
            'title' => 'Lihat Data Pembeli',compact('pembeli')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit',[
            'title' => 'Update Daftar Pembeli lama',compact('pembeli')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $request->validate([
            'nama_pembeli' => ['required','string'],
            'alamat_pembeli' => ['required','string'],
            'foto_pembeli' => ['required'],
            'NIK' => ['required'],
            'jk_pembeli' => ['required','string']
        ]);

        $input=$request->all();

        if($foto = $request->file('foto_pembeli')){
            $judulfoto = date('YmdHis').".".
            $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto',$judulfoto);
            $input['foto']="$judulfoto";

            if($pembeli->foto_pembeli){
                Storage::delete('public/foto'.$pembeli->foto_pembeli);

            }
        }
        else{
                    $judulfoto = $pembeli->foto_pembeli;
                }

        $pembeli->update($input);
        return redirect()->route('pembeli.index')
        ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembeli $pembeli)
    {
        Storage::delete('public/foto'. $pembeli->foto_pembeli);
        $pembeli->delete();
        return redirect()->route('pembeli.index')
        ->with('success','Berhasil dihapus');
    }
}
