<?php

namespace App\Http\Middleware;

use App\Datapeminjaman;
use App\Barang;
use App\JenisBarang;
use Closure;
use Illuminate\Support\Facades\Validator;


class CheckKembaliForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //this Validator check all the parameter that came from form pengembalian using regex validation
        $validator = Validator::make($request->all(),[
            'jenis' => ['required','regex:/^[a-zA-Z0-9]*$/','max:15'],
            'kode' => ['required','regex:/^[a-zA-Z0-9]*$/','max:10'],
            'nim' => ['required','regex:/^[0-9]*$/','min:10','max:10'],
            ]);

        //if data is not valid server will send user a page that tell them their data is not Valid
        if($validator->fails())
        {
            return response(view('error'));
        }

        //if the data that input by user is not match with data in database, server will send user a page that tell them their data is not Valid
        $isDataPengembalianValid = Datapeminjaman::where('kodebarang','=',$request->kode)->where('nim','=',$request->nim)->whereNull('tglkembali')->get();

        if(sizeof($isDataPengembalianValid)!=1)
        {
            //mencari peminjam asli dari kode barang yang diinputkan
            $peminjamAsli = Datapeminjaman::select('peminjam.nama')->join('peminjam','peminjam.nim','=','datapeminjaman.nim')->where('datapeminjaman.kodebarang','=',$request->kode)->whereNull('tglkembali')->get();
            $barangYgDipinjam = JenisBarang::select('nama')->join('barang','barang.jenis','=','jenisbarang.jenis')->where('barang.kode','=',$request->kode)->get();

            return response(view('gagal')->with('data',[
                'status'=> 'Mengembalikan',
                'kode' => $request->kode,
                'jenis' => $barangYgDipinjam[0]->nama,
                'nama' => strtoupper($peminjamAsli[0]->nama)
            ]));
        }

        return $next($request);
    }
}
