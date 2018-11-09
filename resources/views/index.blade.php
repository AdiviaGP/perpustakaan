@extends('template')
@section('title','book')
@section('content')
<div class="col-md-12">
  <input type="text" name="search" id="search" class="form-control" placeholder="Cari Buku" />
</div>
<a href="" class="btn"></a>

        <h3 align="center">Total Buku : <span id="total_records"></span></h3>
        <div class="card-list" id="hasil"></div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>
        $(document).ready(function(){

         fetch_customer_data();

         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('action') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('#hasil').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }

         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
        </script>
  @endsection
