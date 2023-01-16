<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

// use App\Http\Requests\StoreKamarRequest;
// use App\Http\Requests\UpdateKamarRequest;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::latest()->paginate(5);
        return view('admin.kamar',compact('kamars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambahkamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'tipekamar' => 'required',
        //     'jmlkamar' => 'required',
        //     'hargakamar' => 'required',
        //     'gambar' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,zip|max:2048',
        // ]);
        // $path= time() . '.' . $request->gambar->extension();
        // $request->gambar->move(public_path('image'), $path);
        // //$path = $request->file('gambar')->store('public/image');
        // $post = new Kamar;
        // $post->tipe_kamar = $request->tipekamar;
        // $post->jml_kamar = $request->jmlkamar;
        // $post->harga = $request->hargakamar;
        // $post->gambar = $path;
        // $post->save();
                     
        // return redirect()->route('admin.kamar.dashboard')
        //                   ->with('success','Kamar created successfully.');

        $this->validate($request, [
            'gambar'     => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,zip|max:10000',
            'tipekamar'     => 'required',
            'jmlkamar'   => 'required',
            'hargakamar'   => 'required'
        ]);
    
        //upload image
        $image= time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $image);
    
        $post = Kamar::create([
            'gambar'     => $image,
            'tipe_kamar'     => $request->tipekamar,
            'jml_kamar'   => $request->jmlkamar,
            'harga'   => $request->hargakamar
        ]);
    
        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('kamar.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        return view('admin.editkamar',compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKamarRequest  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('gambar')){
            $request->validate([
                'tipekamar'     => 'required',
                'jmlkamar'   => 'required',
                'hargakamar' => 'required',
                'gambar'   => 'required|mimes:jpeg,png,doc,docx,pdf,jpg'
            ]);
        $image = time() . '.' . $request->gambar->extension();
        $request-> gambar->move(public_path('image'),$image);

        $kamar = kamar::findOrFail($id);
        
        $kamar->tipe_kamar = $request->tipekamar;
        $kamar->jml_kamar = $request->jmlkamar;
        $kamar->harga = $request->hargakamar;
        $kamar->gambar = $image;
        $kamar->save();
        }else{

            $kamar = kamar::findOrFail($id);
        
            $kamar->tipe_kamar = $request->tipekamar;
            $kamar->jml_kamar = $request->jmlkamar;
            $kamar->harga = $request->hargakamar;
            $kamar->gambar = $kamar->gambar;
            $kamar->save();
        }

        return redirect()->route('kamar.index')->with(['succes'=>'Data kamat berhasil di hapus']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with(['succes'=>'Data berasil di update!']);
    }
}
