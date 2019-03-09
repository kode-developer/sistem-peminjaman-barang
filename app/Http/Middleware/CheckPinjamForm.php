<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use App\Barang;

class CheckPinjamForm
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
        //this Validator check all the parameter that came from form-peminjaman using regex validation
        $validator = Validator::make($request->all(),[
            'jenis' => ['required','regex:/^[a-zA-Z0-9]*$/','max:15'],
            'kode' => ['required','regex:/^[a-zA-Z0-9]*$/','max:10'],
            'nim' => ['required','regex:/^[0-9]*$/','min:10','max:10'],
            'nama' => ['required','regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/','min:5','max:100'],
            'telepon' => ['required','regex:/^[0-9]*$/','min:9','max:12']
        ]);

        //if data is not valid it will show to user page that tell them their data is not valid
        if($validator->fails()){
            return response(view('error'));
        }

        //cek kode parameter, to make sure the data is valid in database and the barang is still available
        $isBarangValid = Barang::where('kode','=',$request->kode)->where('status','=',1)->get();

        if(sizeof($isBarangValid)!=1){
            return response(view('error'));
        }

        return $next($request);
    }
}
