<?php
namespace Tests\Unit;
/**
* This script is used to generate controllers based on the model structure
* Created by Derrick Rono, Brian Maiyo, Ann Chemutai,
* Emmanuel Kitsao, Winnie Mbaka and Ken Mutuma
* The system is developed by @iLabAfrica Team 
* and is supported by the opensource community.
*/

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OauthRefreshTokenTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->oauthrefreshtokenData=array(
        

        );
    
    	$this->updatedoauthrefreshtokenData=array(
        

        );
    
	}

	public function testStoreOauthRefreshToken()
	{
		$response=$this->json('POST', '/api/oauthrefreshtoken');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListOauthRefreshToken()
	{
		$response=$this->json('GET', '/api/oauthrefreshtoken');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreOauthRefreshToken()
	{
		$this->json('POST', '/api/oauthrefreshtoken',$this->oauthrefreshtokenData);
		$response=$this->json('POST', '/api/oauthrefreshtoken');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateOauthRefreshToken()
	{
		$this->json('POST', '/api/oauthrefreshtoken',$this->updatedoauthrefreshtokenData);
		$response=$this->json('PUT', '/api/oauthrefreshtoken');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteOauthRefreshToken()
	{
		$this->json('POST', '/api/oauthrefreshtoken',$this->oauthrefreshtokenData);
		$response=$this->delete('/api/oauthrefreshtoken/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}