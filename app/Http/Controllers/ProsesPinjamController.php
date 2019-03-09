<?php

namespace App\Http\Controllers;
use App\JenisBarang;
use Illuminate\Http\Request;
use App\Barang;
use App\Peminjam;
use App\Datapeminjaman;
use Carbon\Carbon;
use App\Http\Middleware\CheckPinjamForm;
use Illuminate\Support\Facades\Auth;

class ProsesPinjamController extends Controller
{
    public function __construct()
    {
        //Use this middleware for validate form parameter that come from form peminjaman
        $this->middleware(CheckPinjamForm::class);
    }

    public function store(Request $request){

        //Check for user if their data have been store in system database, it will update the data if not the new data will be insert
        $userPernahMeminjam = Peminjam::where('nim','=',$request->input('nim'))->get();
        if(sizeof($userPernahMeminjam)==1)
        {
            Peminjam::where('nim','=',$request->nim)->update(['nama'=>$request->nama,'telepon'=>$request->telepon]);
        }else{

            Peminjam::create($request->all());
        }

        //Make new Object of table datapeminjaman model
        $datapinjaman = new Datapeminjaman();
        $datapinjaman->kodebarang = $request->kode;
        $datapinjaman->nim = $request->nim;
        $datapinjaman->iduser = Auth::id();
        $datapinjaman->tglpinjam = Carbon::now('Asia/Makassar');
        $datapinjaman->save();

        //Change the status of barang from 1 to 0, one mean avaialable and zero mean unavailable
        Barang::where('kode','=',$request->kode)->update(['status'=>0]);

        $jenis = JenisBarang::where('jenis','=',$request->jenis)->get();
        $jenis = $jenis[0]->nama;
        //Show the Succes page to the user
        return view('sukses')->with('data',[
            'status'=>'Meminjam',
            'nama'=>strtoupper($request->nama),
            'jenis'=>$jenis,'kode'=>$request->kode,
            'nim'=>$request->nim
        ]);
    }
}
