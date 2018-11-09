@extends('template')
@section('title','author')
@section('content')
<a href="{{url('author')}}" class="btn btn-warning">< KEMBALI</a>

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

          <form class="col-md-12" action="{{url('author/'.$author->id)}}" method="post">
            {{csrf_field()}}  {{method_field('PUT')}}
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_penulis" value="{{$author -> nama_penulis}}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Jenis Kelamin</label>
                <div class="custom-control custom-radio">
                  @if($author -> jenis_kelamin === "Laki - laki")
                  <input type="radio" id="customRadio1" name="jenis_kelamin" class="custom-control-input" value="Laki - laki" checked>
                  <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                  @else
                  <input type="radio" id="customRadio1" name="jenis_kelamin" class="custom-control-input" value="Laki - laki">
                  <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                  @endif
                </div>
                <div class="custom-control custom-radio">
                  @if($author -> jenis_kelamin === "Perempuan")
                  <input type="radio" id="customRadio2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" checked>
                  <label class="custom-control-label" for="customRadio2">Perempuan</label>
                  @else
                  <input type="radio" id="customRadio2" name="jenis_kelamin" class="custom-control-input" value="Perempuan">
                  <label class="custom-control-label" for="customRadio2">Perempuan</label>
                  @endif

                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_lahir" value="{{$author -> tanggal_lahir}}">
              </div>

             <button type="submit" class="btn btn-success mb-2">TAMBAH</button>
          </form>
  @endsection
