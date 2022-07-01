@extends('layouts.parent')
@section('title','ALL-PRODUCTS')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col  example1_wrapper">
                <div class="card">
                    @if (session('sucsses'))
    <div class="alert alert-success text-center font-weight-bold">
        {{ session('sucsses') }}
    </div>
@endif
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <div class="card-body">

                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead class="table table-bordered table-hover">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Operations </th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product )


                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name_en}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->price}}</td>
                            <td
                            @class([
                                'text-danger' => ($product->quantity) == 0,
                                'text-warning' => ($product->quantity > 0 && $product->quantity < 5),
                                'text-success' => ($product->quantity >=5)
                            ])

                            >{{$product->quantity}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <a href="{{ route('dashboard.products.edit',['id' => $product->id]) }}"
                                    class="btn  btn-outline-primary"> Edit </a>
                                    <form action="{{route('dashboard.products.delete',['id' => $product->id])}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
<button class="btn  btn-outline-danger">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
  </script>
@endsection
