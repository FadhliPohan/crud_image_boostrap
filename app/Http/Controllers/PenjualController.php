<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjual = Penjual::latest()->paginate();

        return view('penjual.index',[
            'title'=>'Daftar penjual'
        ], compact('penjual'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('penjual.index',[
            'title' => 'Buat Daftar penjual Baru'
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
            'nama_penjual' => ['required','string'],
            'alamat_penjual' => ['required','string'],
            'foto_penjual' => ['required'],
            'NIK' => ['required'],
            'jk_penjual' => ['required','string']
            
        ]);
        $input = $request->all();

        if($foto = $request->file('foto_penjual')){
            $judulfoto = date('YmdHis') .".".
            $foto->getClientOriginalExtension();
            //extention menyimpan
            $foto->storeAs('public/foto',$judulfoto);
            //extention ke database
            $input[$foto] ="$judulfoto";
        }
        Penjual::create($input);
        return redirect()->route('penjual.index')
        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function show(Penjual $penjual)
    {
        return view('penjual.show',[
            'title'=>'Lihat Data Penjual' ],compact('penjual'));
     
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjual $penjual)
    {
         return view('penjual.edit',[
            'title' => 'Update Daftar penjual lama',compact('penjual')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjual $penjual)
    {
         $request->validate([
            'nama_penjual' => ['required','string'],
            'alamat_penjual' => ['required','string'],
            'foto_penjual' => ['required'],
            'NIK' => ['required'],
            'jk_penjual' => ['required','string']
        ]);

        $input=$request->all();

        if($foto = $request->file('foto_penjual')){
            $judulfoto = date('YmdHis').".".
            $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto',$judulfoto);
            $input['foto']="$judulfoto";

            if($penjual->foto_penjual){
                Storage::delete('public/foto'.$penjual->foto_penjual);

            }
        }
        else{
                    $judulfoto = $penjual->foto_penjual;
                }

        $penjual->update($input);
        return redirect()->route('penjual.index')
        ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjual $penjual)
    {
        Storage::delete('public/foto'. $penjual->foto_penjual);
        $penjual->delete();
        return redirect()->route('penjual.index')
        ->with('success','Berhasil dihapus');
    }
}
