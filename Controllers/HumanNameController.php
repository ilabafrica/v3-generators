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
use App\Models\HumanName;

class HumanNameController extends Controller
{
	public function index()
	{

	  $humanname=HumanName::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(HumanName);
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
		"user_id" => 'required',
		"use" => 'required',
		"text" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$humanname= new HumanName;
			$humanname->user_id = $request->input('user_id');
			$humanname->use = $request->input('use');
			$humanname->text = $request->input('text');
			$humanname->family = $request->input('family');
			$humanname->given = $request->input('given');
			$humanname->prefix = $request->input('prefix');
			$humanname->suffix = $request->input('suffix');
			$humanname->period = $request->input('period');

			try{
				$humanname->save();
				return response()->json($humanname);
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
		
      $humanname=HumanName::findorfails($id);

	  return response()->json($humanname);
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
		"user_id" => 'required',
		"use" => 'required',
		"text" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$humanname=HumanName::findorfail($id);
			$humanname->user_id = $request->input('user_id');
			$humanname->use = $request->input('use');
			$humanname->text = $request->input('text');
			$humanname->family = $request->input('family');
			$humanname->given = $request->input('given');
			$humanname->prefix = $request->input('prefix');
			$humanname->suffix = $request->input('suffix');
			$humanname->period = $request->input('period');

			try{
				$humanname->save();
				return response()->json($humanname);
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
			$humanname=HumanName::findorfails($id);
			$humanname->delete();
			return response()->json($humanname,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}