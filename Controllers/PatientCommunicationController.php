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
use App\Models\PatientCommunication;

class PatientCommunicationController extends Controller
{
	public function index()
	{

	  $patientcommunication=PatientCommunication::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(PatientCommunication);
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
		"patient_id" => 'required',
		"language" => 'required',
		"preferred" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$patientcommunication= new PatientCommunication;
			$patientcommunication->patient_id = $request->input('patient_id');
			$patientcommunication->language = $request->input('language');
			$patientcommunication->preferred = $request->input('preferred');

			try{
				$patientcommunication->save();
				return response()->json($patientcommunication);
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
		
      $patientcommunication=PatientCommunication::findorfails($id);

	  return response()->json($patientcommunication);
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
		"patient_id" => 'required',
		"language" => 'required',
		"preferred" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$patientcommunication=PatientCommunication::findorfail($id);
			$patientcommunication->patient_id = $request->input('patient_id');
			$patientcommunication->language = $request->input('language');
			$patientcommunication->preferred = $request->input('preferred');

			try{
				$patientcommunication->save();
				return response()->json($patientcommunication);
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
			$patientcommunication=PatientCommunication::findorfails($id);
			$patientcommunication->delete();
			return response()->json($patientcommunication,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}