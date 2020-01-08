<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Dmdficherep;
use  Validator ;
class DmdficherepController extends BaseController
{
public function index()
{
    # code...
    $Dmdfichereps = Dmdficherep::all();
    return $this->sendResponse($Dmdfichereps->toArray(), 'Dmdfichereps readed succesfully');
}
public function update(Request $request ,Dmdficherep $id)
{
    $input = $request->all();
    $validator =    Validator::make($input, [
    'etat'=> 'required',
    ] );
    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    //$Dmdfichereps = Dmdficherep::all();

    $dmd = Dmdficherep::find($input['id']);
    //$dmd->update($request->only(['etat']));
    $dmd->etat =  $input['etat'];
    $dmd->voiture =  $input['voiture'];
    $dmd->date =  $input['date'];
    $dmd->idMec =  $input['idMec'];
    $dmd->save();

    return $this->sendResponse($dmd->toArray(), 'dmd updated succesfully');

}
public function store(Request $request)
{
    # code...
    $input = $request->all();
    $validator =    Validator::make($input, [
        'id'=>'required',
    'voiture'=> 'required',
    'date'=> 'required',
    'idMec'=>'required',
    'etat'=>'required'
    ] );
    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $dmd = Dmdficherep::create($input);
    return $this->sendResponse($dmd->toArray(), 'dmd created succesfully');

}


}
