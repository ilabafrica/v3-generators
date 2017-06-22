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
use App\Models\EpisodeofCare;

class EpisodeofCareController extends Controller
{
	public function index()
	{

	  $episodeofcare=EpisodeofCare::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(EpisodeofCare);
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
		"patient" => 'required',
		"organization_id" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$episodeofcare= new EpisodeofCare;
			$episodeofcare->status = $request->input('status');
			$episodeofcare->type = $request->input('type');
			$episodeofcare->patient = $request->input('patient');
			$episodeofcare->organization_id = $request->input('organization_id');
			$episodeofcare->period = $request->input('period');
			$episodeofcare->practitioners_id = $request->input('practitioners_id');
			$episodeofcare->team_id = $request->input('team_id');

			try{
				$episodeofcare->save();
				return response()->json($episodeofcare);
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
		
      $episodeofcare=EpisodeofCare::findorfails($id);

	  return response()->json($episodeofcare);
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
		"patient" => 'required',
		"organization_id" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$episodeofcare=EpisodeofCare::findorfail($id);
			$episodeofcare->status = $request->input('status');
			$episodeofcare->type = $request->input('type');
			$episodeofcare->patient = $request->input('patient');
			$episodeofcare->organization_id = $request->input('organization_id');
			$episodeofcare->period = $request->input('period');
			$episodeofcare->practitioners_id = $request->input('practitioners_id');
			$episodeofcare->team_id = $request->input('team_id');

			try{
				$episodeofcare->save();
				return response()->json($episodeofcare);
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
			$episodeofcare=EpisodeofCare::findorfails($id);
			$episodeofcare->delete();
			return response()->json($episodeofcare,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}