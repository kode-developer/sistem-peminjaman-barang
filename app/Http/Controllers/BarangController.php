<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use App\JenisBarang;

class BarangController extends Controller
{
    public function tambah(Request $request)
    {
        $jenis = JenisBarang::select('jenis')->where('jenis','=',$request->jenis)->get();
        if(sizeof($jenis)!=1)
        {
            return view('error');
        }
        $jenis = $jenis[0]->jenis;

        $jumlahbarang = Barang::select('kode')->where('jenis','=',$jenis)->orderBy('id','desc')->take(1)->get();
        if(sizeof($jumlahbarang)<1){
            $jumlahbarang = 0;
        }else{
            $panjangJenisKode = strlen($jenis) +2;
            $jumlahbarang = substr($jumlahbarang[0]->kode,$panjangJenisKode);
        }

        $jumlahtambah = (int)$request->jumlah;
        $hasil =array();

        for($i = $jumlahbarang+1; $i<=$jumlahbarang+$jumlahtambah;$i++)
        {
            $buatKodeBarang = strtoupper($jenis).'00'.strval($i);
            $barang = new Barang();
            $barang->kode = $buatKodeBarang;
            $barang->jenis = $jenis;
            $barang->status = 1;
            $barang->save();
            array_push($hasil,$buatKodeBarang);
        }
        $nama = JenisBarang::where('jenis','=',$request->jenis)->get();
        $nama = $nama[0]->nama;
        $keterangan = "Menambahkan ".$jumlahtambah." ".strtoupper($nama);
        return view('barang/sukses-tambah-barang')->with('keterangan',$keterangan)->with('hasil',$hasil);


    }

    public function tambahjenis(Request $request){

        $checkJenis = JenisBarang::select('jenis','nama')->where('jenis','=',$request->jenis)->get();
        if(sizeof($checkJenis)!=0)
        {
            $checkJenis = $checkJenis[0];
            return view('barang/gagal-tambah')->with('data',$checkJenis);
        }

        $jenisbarang = new JenisBarang();
        $jenisbarang->jenis = strtolower($request->jenis);
        $jenisbarang->nama  = strtoupper($request->nama);
        $jenisbarang->save();

        $keterangan = "Menambahkan Jenis Barang Baru Berupa ".strtoupper($request->nama)." dengan Kode ".strtolower($request->jenis);
        return view('barang/sukses-tambah-barang')->with('keterangan',$keterangan);

    }

    public function hapusbarang(Request $request){
        $kode = $request->kode;

        $valid = Barang::select('kode')->where('kode','=',$kode)->where('status','=',1)->get();
        if(sizeof($valid)!=1){
            return view('error');
        }
        $nama = JenisBarang::select('nama')->where('jenis','=',$request->jenis)->get();
        $nama = $nama[0]->nama;
        Barang::where('kode','=',$kode)->delete();
        return view('barang/sukses-hapus-barang')->with('data',[
            'nama'=>$nama,
            'kode'=>$kode
        ]);
    }

    public function tampilbarang(Request $request){

        $jenisbarang = JenisBarang::select('jenis','nama')->get();
        $barangs = Barang::select('kode','jenis','status')->get();
        return view('barang/data')->with('jenisbarang',$jenisbarang)->with('barangs',$barangs);
    }
}
