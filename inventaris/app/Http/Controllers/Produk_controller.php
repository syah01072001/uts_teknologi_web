<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_produk;
use App\Models\M_supplier;

class Produk_controller extends Controller
{



    public function home(){
        $title = 'List Product';
        $data = M_produk::orderBy('nama','asc')->get();
        //$yajra = url('produk/yajra');

        return view('produk.home',compact('title','data'));
    }
    
    public function add(){
            $title = 'Tambah Produk';
            $supplier = M_supplier::get();
            $kode = rand();
            return view('produk.add',compact('title','supplier','kode'));
    }
    public function store(Request $request){
    	$this->validate($request,[
            
            'kode'=>'required',
            'supplier'=>'required',
    		'nama'=>'required',
    		'tipe'=>'required',
    		'minimal_stock'=>'required',
            'harga'=>'required'

    	]);

    	$a['kode'] = $request->kode;
    	$a['supplier'] = $request->supplier;
    	$a['nama'] = $request->nama;
        $a['tipe'] = $request->tipe;
        $a['minimal_stock'] = $request->minimal_stock;
        $a['harga'] = $request->harga;
    	$a['created_at'] = date('Y-m-d H:i:s');
    	$a['updated_at'] = date('Y-m-d H:i:s');

    	M_produk::insert($a);

    	\Session::flash('sukses','Data berhasil ditambah');

    	return redirect('produk');
    }

    public function edit($id){
        $title = 'Edit Produk';
        $dt = M_produk::find($id);
        $supplier = M_supplier::get();

        return view('produk.edit',compact('title','dt','supplier'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'kode'=>'required',
            'supplier'=>'required',
    		'nama'=>'required',
    		'tipe'=>'required',
    		'minimal_stock'=>'required',
            'harga'=>'required'
        ]);

        $a['kode'] = $request->kode;
    	$a['supplier'] = $request->supplier;
    	$a['nama'] = $request->nama;
        $a['tipe'] = $request->tipe;
        $a['minimal_stock'] = $request->minimal_stock;
        $a['harga'] = $request->harga;
        // $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        M_produk::where('id',$id)->update($a);

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect('produk');
    }


    public function delete($id){
        try {
            M_produk::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('produk');
    }


    
    
}
