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
use App\Models\Organization;

class OrganizationController extends Controller
{
	public function index()
	{

	  $organization=Organization::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(Organization);
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
		"active" => 'required',
		"type" => 'required',
		"name" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$organization= new Organization;
			$organization->user_id = $request->input('user_id');
			$organization->active = $request->input('active');
			$organization->type = $request->input('type');
			$organization->name = $request->input('name');
			$organization->alias = $request->input('alias');
			$organization->telecom = $request->input('telecom');
			$organization->address = $request->input('address');
			$organization->part_of = $request->input('part_of');
			$organization->end_point = $request->input('end_point');

			try{
				$organization->save();
				return response()->json($organization);
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
		
      $organization=Organization::findorfails($id);

	  return response()->json($organization);
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
		"active" => 'required',
		"type" => 'required',
		"name" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$organization=Organization::findorfail($id);
			$organization->user_id = $request->input('user_id');
			$organization->active = $request->input('active');
			$organization->type = $request->input('type');
			$organization->name = $request->input('name');
			$organization->alias = $request->input('alias');
			$organization->telecom = $request->input('telecom');
			$organization->address = $request->input('address');
			$organization->part_of = $request->input('part_of');
			$organization->end_point = $request->input('end_point');

			try{
				$organization->save();
				return response()->json($organization);
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
			$organization=Organization::findorfails($id);
			$organization->delete();
			return response()->json($organization,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}