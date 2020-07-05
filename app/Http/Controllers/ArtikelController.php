<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use ArtikelSeeder;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Artikel::get_all();
        // dd($item);
        return view('layouts.artikel.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.artikel.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $slug = Str::slug($request->judul, '-');
        //dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        Artikel::save([
            'judul'     => $request->judul,
            'isi'     => $request->isi,
            'slug' => Str::slug($request->judul, '-'),
            'tag'     => $request->tag,
            'user_id'     => 1,
        ]);
        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::lihat($id);
        // dd($article);
        return view('layouts.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::lihat($id);
        return view('layouts.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$slug = Str::slug($request->judul, '-');
        $data = $request->all();
        unset($data["_token"]);
        // dd($data);   
        Artikel::updateData([
            'judul'     => $request->judul,
            'isi'     => $request->isi,
            'slug' => Str::slug($request->judul, '-'),
            'tag'     => $request->tag,
            'user_id'     => 1,
        ], $id);

        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request['id'] = $id;
        $data = Artikel::hapus($id);

        return redirect('/artikel');
    }
}
