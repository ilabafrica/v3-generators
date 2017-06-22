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

class UserTypeTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->usertypeData=array(
        
			"name"=>'Sample String',
			"description"=>'Sample String',

        );
    
    	$this->updatedusertypeData=array(
        
			"name"=>'Sample updated String',
			"description"=>'Sample updated String',

        );
    
	}

	public function testStoreUserType()
	{
		$response=$this->json('POST', '/api/usertype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListUserType()
	{
		$response=$this->json('GET', '/api/usertype');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreUserType()
	{
		$this->json('POST', '/api/usertype',$this->usertypeData);
		$response=$this->json('POST', '/api/usertype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateUserType()
	{
		$this->json('POST', '/api/usertype',$this->updatedusertypeData);
		$response=$this->json('PUT', '/api/usertype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteUserType()
	{
		$this->json('POST', '/api/usertype',$this->usertypeData);
		$response=$this->delete('/api/usertype/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}