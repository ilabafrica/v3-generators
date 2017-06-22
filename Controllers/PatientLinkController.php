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
use App\Models\PatientLink;

class PatientLinkController extends Controller
{
	public function index()
	{

	  $patientlink=PatientLink::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(PatientLink);
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
		"other" => 'required',
		"type" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$patientlink= new PatientLink;
			$patientlink->patient_id = $request->input('patient_id');
			$patientlink->other = $request->input('other');
			$patientlink->type = $request->input('type');

			try{
				$patientlink->save();
				return response()->json($patientlink);
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
		
      $patientlink=PatientLink::findorfails($id);

	  return response()->json($patientlink);
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
		"other" => 'required',
		"type" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$patientlink=PatientLink::findorfail($id);
			$patientlink->patient_id = $request->input('patient_id');
			$patientlink->other = $request->input('other');
			$patientlink->type = $request->input('type');

			try{
				$patientlink->save();
				return response()->json($patientlink);
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
			$patientlink=PatientLink::findorfails($id);
			$patientlink->delete();
			return response()->json($patientlink,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}