<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Paiment;
use  Validator ;
use Illuminate\Support\Facades\DB;
class PaimentController extends BaseController
{
public function index()
{
    # code...
    $Paiments = DB::table('paiments')
    ->join('dmdfichereps', function ($join) {
        $join->on('paiments.idDmd', '=', 'dmdfichereps.id');
    }
    )
    ->select('paiments.*', 'dmdfichereps.*')
    ->get();
    return $this->sendResponse($Paiments->toArray(), 'paiment readed succesfully');
}

public function store(Request $request)
{
    # code...
    $input = $request->all();
    $validator =    Validator::make($input, [
    'prixPayee'=>'required',
    'idComptable'=>'required',
    'idClt'=>'required',
    'idDmd'=>'required',
    ] );
    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $dmd = Paiment::create($input);
    return $this->sendResponse($dmd->toArray(), 'Paiment created succesfully');

}


}
