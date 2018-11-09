@extends('template')
@section('title','genre')
@section('content')

<a href="{{url('genre/create')}}" class="btn btn-primary">TAMBAH</a>
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

<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Genre</th>
    <th scope="col">Aksi</th>
  </tr>
</thead>
<tbody>
  <?php $no = 1; ?>
  @foreach($genre as $genre)
  <tr>
    <th scope="row">{{$no++}}</th>
    <td>{{$genre -> nama_genre}}</td>
    <td class="aksi">
      <a href="{{url('genre/'.$genre -> id.'/edit')}}" class="btn btn-info">EDIT</a>
      <form action="{{url('genre/'.$genre -> id)}}" method="post">
        {{csrf_field()}} {{method_field('DELETE')}}
        <button type="submit" name="button" class="btn btn-danger">DELETE</button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>

  @endsection
