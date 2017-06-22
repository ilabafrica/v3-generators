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

class OauthClientTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->oauthclientData=array(
        
			"name"=>'Sample String',

        );
    
    	$this->updatedoauthclientData=array(
        
			"name"=>'Sample updated String',

        );
    
	}

	public function testStoreOauthClient()
	{
		$response=$this->json('POST', '/api/oauthclient');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListOauthClient()
	{
		$response=$this->json('GET', '/api/oauthclient');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreOauthClient()
	{
		$this->json('POST', '/api/oauthclient',$this->oauthclientData);
		$response=$this->json('POST', '/api/oauthclient');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateOauthClient()
	{
		$this->json('POST', '/api/oauthclient',$this->updatedoauthclientData);
		$response=$this->json('PUT', '/api/oauthclient');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteOauthClient()
	{
		$this->json('POST', '/api/oauthclient',$this->oauthclientData);
		$response=$this->delete('/api/oauthclient/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}