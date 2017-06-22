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
use App\Models\EpisodeOfCareDiagnosis;

class EpisodeOfCareDiagnosisController extends Controller
{
	public function index()
	{

	  $episodeofcarediagnosis=EpisodeOfCareDiagnosis::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(EpisodeOfCareDiagnosis);
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
		"condition" => 'required',
		"role" => 'required',
		"rank" => 'required',
		"episode_of_care_id" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$episodeofcarediagnosis= new EpisodeOfCareDiagnosis;
			$episodeofcarediagnosis->condition = $request->input('condition');
			$episodeofcarediagnosis->role = $request->input('role');
			$episodeofcarediagnosis->rank = $request->input('rank');
			$episodeofcarediagnosis->episode_of_care_id = $request->input('episode_of_care_id');

			try{
				$episodeofcarediagnosis->save();
				return response()->json($episodeofcarediagnosis);
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
		
      $episodeofcarediagnosis=EpisodeOfCareDiagnosis::findorfails($id);

	  return response()->json($episodeofcarediagnosis);
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
		"condition" => 'required',
		"role" => 'required',
		"rank" => 'required',
		"episode_of_care_id" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$episodeofcarediagnosis=EpisodeOfCareDiagnosis::findorfail($id);
			$episodeofcarediagnosis->condition = $request->input('condition');
			$episodeofcarediagnosis->role = $request->input('role');
			$episodeofcarediagnosis->rank = $request->input('rank');
			$episodeofcarediagnosis->episode_of_care_id = $request->input('episode_of_care_id');

			try{
				$episodeofcarediagnosis->save();
				return response()->json($episodeofcarediagnosis);
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
			$episodeofcarediagnosis=EpisodeOfCareDiagnosis::findorfails($id);
			$episodeofcarediagnosis->delete();
			return response()->json($episodeofcarediagnosis,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}