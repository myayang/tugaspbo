<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use Datatables;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faskamars = FasilitasKamar::orderBy('created_at', 'DESC')->get();
        return view('admin.fasilitaskamar',compact('faskamars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekmr = Kamar::all();
        return view('admin.tambahfasilitaskamar', compact('tipekmr'));
    }

    public function tambahfasilitaskamar()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipekamar' => 'required',
            'fasilitas' => 'required'
        ]);
    
        //upload image
    
        $post = new FasilitasKamar;
        $post->id_kamar = $request->tipekamar;
        $post->nama_fasilitas = $request->fasilitas;
        $post->save();

        return redirect('fasilitaskamar.index')
                     ->with('success', 'Kamar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar, FasilitasKamar $fasilitaskamar)
    {
        $kamar=Kamar::all();
        return view('admin.editfasilitaskamar',compact('kamar','fasilitaskamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasKamarRequest  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
            $request->validate([
                'tipekamar'     => 'required',
                'fasilitas'   => 'required'
            ]);

            $post = FasilitasKamar::findOrFail($id);
            $post->id_kamar = $request->tipekamar;
            $post->nama_fasilitas = $request->fasilitas;
            $post->save();

            return redirect()->route('fasilitaskamar.index')
                             ->with('success', 'Kamar created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        $fasilitaskamar->delete();
        return redirect()->route('fasilitaskamar.index')->with(['succes'=>'Data berasil di hapus!']);
    }
}
