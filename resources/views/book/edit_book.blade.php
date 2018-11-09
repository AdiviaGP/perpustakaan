@extends('template')
@section('title','author')
@section('content')
<a href="{{url('book')}}" class="btn btn-warning">< KEMBALI</a>

<!-- count error -->
          @if (count($errors) > 0)
            <div class="alert alert-danger imgdiv">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
          <!-- print  error -->
                    @foreach ($errors->all() as $error_val)
                        <li>{{ $error_val }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($success_message = Session::get('success'))
        <div class="alert alert-success alert-block imgdiv">
            <button type="button" class="close imgdiv" data-dismiss="alert">×</button>
                <strong>{{ $success_message }}</strong>
        </div>
        @endif

          <form class="col-md-12" action="{{url('book/'.$book->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}{{method_field('PUT')}}
              <div class="form-group">
                <label for="exampleFormControlInput1">Judul Buku</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_buku" value="{{$book -> nama_buku}}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{$book -> deskripsi}}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tahun Terbit</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="tahun_terbit" value="{{$book -> tahun_terbit}}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Author</label>
                <select class="form-control" id="exampleFormControlSelect1" name="author_id">
                  <option value="{{$book -> author_id}}">{{$book -> author -> nama_penulis}}</option>
                  @foreach($author as $author)
                  <option value="{{$author -> id }}">{{$author -> nama_penulis }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">genre</label>
                <select class="form-control" id="exampleFormControlSelect1" name="genre_id">
                  <option value="{{$book -> genre_id}}">{{$book -> genre -> nama_genre}}</option>
                  @foreach($genre as $genre)
                  <option value="{{$genre -> id }}">{{$genre -> nama_genre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="cover">Cover Buku</label>
                <input type="file" class="form-control" name="cover" id="cover" placeholder="">
              </div>

             <button type="submit" class="btn btn-success mb-2">EDIT</button>
          </form>
  @endsection
