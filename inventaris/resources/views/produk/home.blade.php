@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('produk/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-refresh"></i> Tambah Produk</a>
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table myTable">
                        <thead>
                            <tr>
                                <th>action</th>
                                <th>ID</th>
                                <th>supplier</th>
                                <th>kode</th>
                                <th>nama</th>
                                <th>tipe</th>
                                <th>jumlah</th>
                                <th>harga per unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>
                                    <div style="width:60px"><a href="{{ url('produk/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                    <button href="{{ url('produk/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button></div>
                                </td>
                                <td>{{ $dt->id }}</td>
                                <td>{{ $dt->supplier_r->nama }}</td>
                                <td>{{ $dt->kode }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->tipe }}</td>
                                <td>{{ $dt->minimal_stock }}</td>
                                <td>{{ $dt->harga }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection