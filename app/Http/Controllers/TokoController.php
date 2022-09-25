<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::latest()->paginate();

        return view('toko.index', [
            'title' => 'Toko'
        ], compact('toko'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko.add',['title'=>'Tambahkan Toko Baru']);
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
            'nama_toko' => ['required','string'],
            'jenis_toko' => ['required','string'],
            'foto_toko' => ['required'],
            'alamat_toko' => ['required']
            
        ]);
        $input = $request->all();

        if($foto = $request->file('foto_toko')){
            $judulfoto = date('YmdHis') .".".
            $foto->getClientOriginalExtension();
            //extention menyimpan
            $foto->storeAs('public/foto',$judulfoto);
            //extention ke database
            $input[$foto] ="$judulfoto";
        }
        toko::create($input);
        return redirect()->route('toko.index')
        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
          return view('toko.show',[
            'title' => 'Lihat Data toko',compact('toko')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
         return view('toko.edit',[
            'title' => 'Update Daftar toko lama',compact('toko')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
          $request->validate([
            'nama_toko' => ['required','string'],
            'jenis_toko' => ['required','string'],
            'foto_toko' => ['required'],
            'alamat_toko' => ['required']
        ]);

        $input=$request->all();

        if($foto = $request->file('foto_toko')){
            $judulfoto = date('YmdHis').".".
            $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto',$judulfoto);
            $input['foto']="$judulfoto";

            if($toko->foto_toko){
                Storage::delete('public/foto'.$toko->foto_toko);

            }
        }
        else{
                    $judulfoto = $toko->foto_toko;
                }

        $toko->update($input);
        return redirect()->route('toko.index')
        ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        Storage::delete('public/foto'. $toko->foto_toko);
        $toko->delete();
        return redirect()->route('toko.index')
        ->with('success','Berhasil dihapus');
    }
}
