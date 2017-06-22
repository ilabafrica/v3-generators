<?php
namespace App\Http\Controllers;
/**
* This script is used to generate controllers based on the model structure
* Created by Derrick Rono, Brian Maiyo, Ann Chemutai,
* Emmanuel Kitsao, Winnie Mbaka and Ken Mutuma
* The system is developed by @iLabAfrica Team 
* and is supported by the opensource community.
*/

use Illuminate\Http\Request;
use App\Models\Specimen;

class SpecimenController extends Controller
{
	public function index()
	{

	  $specimen=Specimen::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(Specimen);
	}


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
	{


        $rules=array(
		"status" => 'required',
		"type" => 'required',
		"subject" => 'required',
		"received_time" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$specimen= new Specimen;
			$specimen->accession_identifier = $request->input('accession_identifier');
			$specimen->status = $request->input('status');
			$specimen->type = $request->input('type');
			$specimen->subject = $request->input('subject');
			$specimen->received_time = $request->input('received_time');
			$specimen->parent = $request->input('parent');
			$specimen->note = $request->input('note');

			try{
				$specimen->save();
				return response()->json($specimen);
			}
			catch (\Illuminate\Database\QueryException $e){
				return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
			}
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
		
      $specimen=Specimen::findorfails($id);

	  return response()->json($specimen);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
	{
    
        $rules=array(
		"status" => 'required',
		"type" => 'required',
		"subject" => 'required',
		"received_time" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$specimen=Specimen::findorfail($id);
			$specimen->accession_identifier = $request->input('accession_identifier');
			$specimen->status = $request->input('status');
			$specimen->type = $request->input('type');
			$specimen->subject = $request->input('subject');
			$specimen->received_time = $request->input('received_time');
			$specimen->parent = $request->input('parent');
			$specimen->note = $request->input('note');

			try{
				$specimen->save();
				return response()->json($specimen);
			}
			catch (\Illuminate\Database\QueryException $e){
				return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
			}
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id){
		
    	try{
			$specimen=Specimen::findorfails($id);
			$specimen->delete();
			return response()->json($specimen,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}