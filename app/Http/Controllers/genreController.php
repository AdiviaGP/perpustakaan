<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\genre;

class genreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $genre = genre::all();
      return view('genre.genre', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('genre.tambah_genre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
          'nama_genre' => 'required'
      ]);

      $genre = new genre;
      $genre -> nama_genre = $request->nama_genre;

      $genre->save();
      return redirect()->back()->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $genre = genre::find($id);
      return view('genre.edit_genre', compact('genre'));

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
      $this->validate($request, [
          'nama_genre' => 'required'
      ]);
      
      $genre = genre::find($id);
      $genre -> nama_genre = $request->nama_genre;

      $genre->save();
      return redirect()->back()->with('success','Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete = genre::find($id);
      $delete -> delete();
      return redirect()->back()->with('success','Berhasil');
    }
}
