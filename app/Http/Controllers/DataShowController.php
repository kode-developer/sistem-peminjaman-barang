<?php

namespace App\Http\Controllers;

use App\Datapeminjaman;
use App\Peminjam;
use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;

class DataShowController extends Controller
{
    public function datapeminjaman(Request $request){
        $awal = $request->awal;
        $akhir = $request->akhir;

        if($awal>$akhir)
        {
            return view('peminjaman/datapeminjaman-form')->with('error','');
        }

        $awal = date('Y-m-d',strtotime($awal));
        $akhir = date('Y-m-d',strtotime($akhir."+1 days"));
        $databarang = Datapeminjaman::where('tglpinjam','>=',$awal)->where('tglpinjam','<=',$akhir)->get();

        $awal = date('d-m-Y',strtotime($awal));
        $akhir = date('d-m-Y',strtotime($akhir."-1 days"));


        return view('peminjaman/data-peminjaman-show')->with('databarang',$databarang)->with('awal',$awal)->with('akhir',$akhir);
    }

    public function home(Request $request){
        $datapeminjaman = Datapeminjaman::select('kodebarang','nim','tglpinjam')->whereNull('tglkembali')->get();
        if(sizeof($datapeminjaman)<1)
        {
            return view('home');
        }
        return view('home')->with('datapeminjaman',$datapeminjaman);
    }

    public function datapeminjam(Request $request)
    {
        $peminjam = Peminjam::where('nim','=',$request->nim)->get();
        if(sizeof($peminjam)!=1)
        {
            return view('error');
        }
        $peminjam = $peminjam[0];
        $kaliMeminjam = Datapeminjaman::where('nim','=',$peminjam->nim)->count();
        return view('peminjaman/data-peminjam')->with('peminjam',$peminjam)->with('jumlah',$kaliMeminjam);
    }

    public function about(Request $request)
    {
        return view('about');
    }

    public static function getbulan(int $bulan){
        $namaBulan='';
        switch ($bulan){
            case 1:$namaBulan = "Januari";
                    break;
            case 2:$namaBulan = "Februai";
                    break;
            case 3: $namaBulan = "Maret";
                break;
            case 4: $namaBulan = "April";
                break;
            case 5: $namaBulan = "Mei";
                break;
            case 6: $namaBulan = "Juni";
                break;
            case 7: $namaBulan = "Juli";
                break;
            case 8: $namaBulan = "Agustus";
                break;
            case 9: $namaBulan = "September";
                break;
            case 10: $namaBulan = "Oktober";
                break;
            case 11: $namaBulan = "November";
                break;
            case 12: $namaBulan = "Desember";
                break;
        }
        return $namaBulan;
    }
}
