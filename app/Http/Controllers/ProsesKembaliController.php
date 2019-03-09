<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Datapeminjaman;
use App\Http\Middleware\CheckKembaliForm;
use App\Peminjam;
use App\JenisBarang;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProsesKembaliController extends Controller
{
    public function __construct()
    {   //use Middleware Class CheckKembali to validate Form from user, so this Controller don't need to validete data form again
        $this->middleware(CheckKembaliForm::class);
    }


    public function store(Request $request){
        //using Carbon class to create current time
        $now =  Carbon::now('Asia/Makassar');

        //update table datapeminjaman, in the field tgl kembali with current time
        Datapeminjaman::where('kodebarang','=',$request->kode)->where('nim','=',$request->nim)->update(['tglkembali'=>$now]);

        //change status of barang that dikembalikan by peminjam, from zero to one, 1 mean available and 0 mean unavailable
        Barang::where('kode','=',$request->kode)->update(['status'=>1]);

        //get data Peminjam that recently mengembalikan barang
        $nama = Peminjam::where('nim','=',$request->nim)->get();

        $jenis = JenisBarang::where('jenis','=',$request->jenis)->get();
        $jenis = $jenis[0]->nama;
        //return that data to view, so peminjam can see they are succesfully melakukan pengembalian barang
        return view('sukses')->with('data',[
            'status'=>'Mengembalikan',
            'jenis'=>$jenis,
            'kode'=>$request->kode,
            'nama'=>strtoupper($nama[0]->nama),
            'nim'=>$request->nim
        ]);
    }
}
