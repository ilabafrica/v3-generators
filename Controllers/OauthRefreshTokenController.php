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
use App\Models\OauthRefreshToken;

class OauthRefreshTokenController extends Controller
{
	public function index()
	{

	  $oauthrefreshtoken=OauthRefreshToken::orderBy('id', 'ASC')->paginate(20);

	  return response()->json(OauthRefreshToken);
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
		"access_token_id" => 'required',
		"revoked" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator);
		} else {
			$oauthrefreshtoken= new OauthRefreshToken;
			$oauthrefreshtoken->access_token_id = $request->input('access_token_id');
			$oauthrefreshtoken->revoked = $request->input('revoked');
			$oauthrefreshtoken->expires_at = $request->input('expires_at');

			try{
				$oauthrefreshtoken->save();
				return response()->json($oauthrefreshtoken);
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
		
      $oauthrefreshtoken=OauthRefreshToken::findorfails($id);

	  return response()->json($oauthrefreshtoken);
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
		"access_token_id" => 'required',
		"revoked" => 'required',

		);
        $validator = \Validator::make($request->all(),$rules);
		 if ($validator->fails()) {
			 return response()->json($validator,422);
		} else {
			$oauthrefreshtoken=OauthRefreshToken::findorfail($id);
			$oauthrefreshtoken->access_token_id = $request->input('access_token_id');
			$oauthrefreshtoken->revoked = $request->input('revoked');
			$oauthrefreshtoken->expires_at = $request->input('expires_at');

			try{
				$oauthrefreshtoken->save();
				return response()->json($oauthrefreshtoken);
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
			$oauthrefreshtoken=OauthRefreshToken::findorfails($id);
			$oauthrefreshtoken->delete();
			return response()->json($oauthrefreshtoken,200);
		}
		catch (\Illuminate\Database\QueryException $e){
			return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}