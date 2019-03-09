<?php

namespace App\Http\Controllers;

use App\JenisBarang;
use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;

class RequestFormController extends Controller
{
    public function peminjaman(Request $request)
    {
        //if all the barang is not available then, system will show them a page that tell them the all barang is not avaialable
        $available = Barang::select('kode')->where('status','=',1)->get();
        if(sizeof($available)<1){
            return view('not-available')->with('data',[
                'satu'=>'Peminjaman',
                'dua' => 'Semua Barang Telah Dipinjam'
            ]);
        }

        $barangs = Barang::select('kode','jenis')->where('status','=',1)->get();

        $jenisBarangTersedia= JenisBarang::select('jenisbarang.jenis','jenisbarang.nama')->join('barang','barang.jenis','=','jenisbarang.jenis')->where('barang.status','=',1)->distinct()->get();
        return view('peminjaman-form')->with('barangs',$barangs)->with('jenisbarangtersedia',$jenisBarangTersedia);
    }


    public function pengembalian(Request $request)
    {
        $dipinjam = Barang::select('kode')->where('status','=',0)->get();

        if(sizeof($dipinjam)<1){
            return view('not-available')->with('data',[
                'satu'=>'Pengembalian',
                'dua' => 'Belum Ada yang Meminjam Barang'
            ]);
        }

        $barangs = Barang::select('kode','jenis')->where('status','=',0)->get();
        $jenisBarangTersedia= $jenisBarangTersedia= JenisBarang::select('jenisbarang.jenis','jenisbarang.nama')->join('barang','barang.jenis','=','jenisbarang.jenis')->where('barang.status','=',0)->distinct()->get();

        return view('pengembalian-form')->with('barangs',$barangs)->with('jenisbarangtersedia',$jenisBarangTersedia);
    }

    public function tambahbarang(Request $request){
        $jenisbarang = JenisBarang::select('jenis','nama')->get();
        return view('barang/tambah-form')->with('jenisbarang',$jenisbarang);
    }

    public function hapusbarang(Request $request){
        $jenisbarang = JenisBarang::select('jenisbarang.jenis','jenisbarang.nama')->join('barang','barang.jenis','=','jenisbarang.jenis')->distinct()->get();
        $barang = Barang::select('kode','jenis','status')->get();
        return view('barang/hapus-form')->with('jenisbarang',$jenisbarang)->with('barangs',$barang);
    }

    public function datapeminjaman(Request $request){

        return view('peminjaman/datapeminjaman-form');
    }

}
