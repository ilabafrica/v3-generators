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
use App\Models\Processing;

class ProcessingController extends Controller
{
	public function index()
	{

	  $processing=Processing::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(Processing);
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
		"description" => 'required',
		"procedure" => 'required',
		"period" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$processing= new Processing;
			$processing->description = $request->input('description');
			$processing->procedure = $request->input('procedure');
			$processing->period = $request->input('period');

			try{
				$processing->save();
				return response()->json($processing);
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
		
      $processing=Processing::findorfails($id);

	  return response()->json($processing);
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
		"description" => 'required',
		"procedure" => 'required',
		"period" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$processing=Processing::findorfail($id);
			$processing->description = $request->input('description');
			$processing->procedure = $request->input('procedure');
			$processing->period = $request->input('period');

			try{
				$processing->save();
				return response()->json($processing);
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
			$processing=Processing::findorfails($id);
			$processing->delete();
			return response()->json($processing,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}