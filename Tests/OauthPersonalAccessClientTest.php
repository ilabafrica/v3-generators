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

class OauthPersonalAccessClientTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->oauthpersonalaccessclientData=array(
        

        );
    
    	$this->updatedoauthpersonalaccessclientData=array(
        

        );
    
	}

	public function testStoreOauthPersonalAccessClient()
	{
		$response=$this->json('POST', '/api/oauthpersonalaccessclient');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListOauthPersonalAccessClient()
	{
		$response=$this->json('GET', '/api/oauthpersonalaccessclient');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreOauthPersonalAccessClient()
	{
		$this->json('POST', '/api/oauthpersonalaccessclient',$this->oauthpersonalaccessclientData);
		$response=$this->json('POST', '/api/oauthpersonalaccessclient');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateOauthPersonalAccessClient()
	{
		$this->json('POST', '/api/oauthpersonalaccessclient',$this->updatedoauthpersonalaccessclientData);
		$response=$this->json('PUT', '/api/oauthpersonalaccessclient');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteOauthPersonalAccessClient()
	{
		$this->json('POST', '/api/oauthpersonalaccessclient',$this->oauthpersonalaccessclientData);
		$response=$this->delete('/api/oauthpersonalaccessclient/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}