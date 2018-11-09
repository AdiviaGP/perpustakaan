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

          <form class="col-md-12" action="{{url('author')}}" method="post">
            {{csrf_field()}}
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_penulis">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Jenis Kelamin</label>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio1" name="jenis_kelamin" class="custom-control-input" value="Laki - laki">
                  <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio2" name="jenis_kelamin" class="custom-control-input" value="Perempuan">
                  <label class="custom-control-label" for="customRadio2">Perempuan</label>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_lahir">
              </div>

             <button type="submit" class="btn btn-success mb-2">TAMBAH</button>
          </form>
  @endsection
