@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('produk') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form role="form" accept="{{ url('produk/'.$dt->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Supplier</label>
                      <select class="form-control select2" name="supplier">
                          @foreach($supplier as $sp)
                          <option value="{{ $sp->id }}" {{ ($dt->supplier == $sp->id) ? 'selected' : '' }}>{{ $sp->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode</label>
                      <input type="number" name="kode" value="{{ $dt->kode }}" class="form-control" id="exampleInputPassword1" placeholder="Kode Produk">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Supplier">
                    </div>
                   
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tipe</label>
                      <input class="form-control" name="tipe" rows="5"></input>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Produk</label>
                      <input type="number" name="minimal_stock" class="form-control" id="exampleInputPassword1" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga per Unit</label>
                      <input type="number" name="harga" class="form-control" id="exampleInputPassword1">
                    </div>             
                    
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>

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