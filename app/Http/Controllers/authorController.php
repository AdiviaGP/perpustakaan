<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\author;


class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = author::all();
        return view('author.author', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.tambah_author');
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
          'nama_penulis' => 'required',
          'jenis_kelamin' => 'required',
          'tanggal_lahir' => 'required',
      ]);

        $author = new author;
        $author -> nama_penulis = $request->nama_penulis;
        $author -> jenis_kelamin = $request->jenis_kelamin;
        $author -> tanggal_lahir = $request -> tanggal_lahir;

        $author->save();
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
        $author = author::find($id);
        return view('author.edit_author', compact('author'));
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
          'nama_penulis' => 'required',
          'jenis_kelamin' => 'required',
          'tanggal_lahir' => 'required',
      ]);

      $author = author::find($id);
      $author -> nama_penulis = $request->nama_penulis;
      $author -> jenis_kelamin = $request->jenis_kelamin;
      $author -> tanggal_lahir = $request -> tanggal_lahir;

      $author->save();
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
      $delete = author::find($id);
      $delete -> delete();
      return redirect()->back()->with('success','Berhasil');
    }
}
