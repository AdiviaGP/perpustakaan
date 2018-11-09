@extends('template')
@section('title','genre')
@section('content')
<a href="{{url('genre')}}" class="btn btn-warning">< KEMBALI</a>

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

          <form class="col-md-12" action="{{url('genre/'.$genre->id)}}" method="post">
            {{csrf_field()}}  {{method_field('PUT')}}
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama genre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_genre" value="{{$genre -> nama_genre}}">
              </div>


             <button type="submit" class="btn btn-success mb-2">EDIT</button>
          </form>
  @endsection
