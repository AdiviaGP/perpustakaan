<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\author;
use App\genre;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function dashboard()
     {
       return view('index');
     }

     public function action(Request $request)
         {
          if($request->ajax()){
             $output = '';
             $query = $request->get('query');
               if($query != '')
               {
                $data = book::where('status', '0')
                ->where('nama_buku', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();
               }
           else
             {
              $data = book::where('status', '0')
                ->orderBy('id', 'desc')
                ->get();
             }

           $total_row = $data->count();
           if($total_row > 0)
           {
            foreach($data as $row)
            {
            $genre = $row -> genre -> nama_genre;
            $author = $row -> author -> nama_penulis;
             $output .= '

               <div class="card">
                   <div class="card__image"><img src="storage/cover/'.$row->cover.'" alt="" height="250px"></div>
                   <div class="card__content">
                       <span class="genre">'.$genre.'</span>
                       <h3 class="card__title"><b>'.$row -> nama_buku.'</b></h3>
                       <sub><b>Author : '.$author.'</b></sub><br>
                       <sub><b>Tahun Terbit : '.$row -> tahun_terbit.'</b></sub><br>
                       <sub>'.$row->deskripsi.'</sub>
                   </div>
               </div>

             ';
            }
           }
           else
           {
            $output = '
            <h3>No Data Found</h3>
            ';
           }
           $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
           );
           echo json_encode($data);
          }
         }

     // ###############################################
    public function index()
    {
      $book = book::all();
      return view('book.book', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $author = author::all();
      $genre = genre::all();
      return view('book.tambah_book', compact('author','genre'));
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
          'nama_buku' => 'required',
          'deskripsi' => 'required',
          'tahun_terbit' => 'required',
          'author_id' => 'required',
          'genre_id' => 'required',
          'cover.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

      ]);

      $book = new book;
      $book -> nama_buku = $request->nama_buku;
      $book -> deskripsi = $request->deskripsi;
      $book -> tahun_terbit = $request->tahun_terbit;
      $book -> author_id = $request->author_id;
      $book -> genre_id = $request->genre_id;
      if($request->hasFile('cover')){
        $filename = $request->cover->getClientOriginalName();
        $request->cover ->storeAs('public/cover',$filename);
        $book -> cover = $filename;
      }

      $book->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = author::all();
        $genre = genre::all();
        $book = book::find($id);
        return view('book.edit_book', compact('book','author','genre'));
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
          'nama_buku' => 'required',
          'deskripsi' => 'required',
          'tahun_terbit' => 'required',
          'author_id' => 'required',
          'genre_id' => 'required',
          'cover.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

      ]);

        $book = book::find($id);
        $book -> nama_buku = $request->nama_buku;
        $book -> deskripsi = $request->deskripsi;
        $book -> tahun_terbit = $request->tahun_terbit;
        $book -> author_id = $request->author_id;
        $book -> genre_id = $request->genre_id;
        if($request->hasFile('cover')){
          $filename = $request->cover->getClientOriginalName();
          $request->cover ->storeAs('public/cover',$filename);
          $book -> cover = $filename;
        }

        $book->save();
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
      $delete = book::find($id);
      $delete -> delete();
      return redirect()->back()->with('success','Berhasil');
    }
}
