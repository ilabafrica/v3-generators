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

class UserTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->userData=array(
        
			"email"=>'Sample String',
			"password"=>'Sample String',

        );
    
    	$this->updateduserData=array(
        
			"email"=>'Sample updated String',
			"password"=>'Sample updated String',

        );
    
	}

	public function testStoreUser()
	{
		$response=$this->json('POST', '/api/user');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListUser()
	{
		$response=$this->json('GET', '/api/user');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreUser()
	{
		$this->json('POST', '/api/user',$this->userData);
		$response=$this->json('POST', '/api/user');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateUser()
	{
		$this->json('POST', '/api/user',$this->updateduserData);
		$response=$this->json('PUT', '/api/user');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteUser()
	{
		$this->json('POST', '/api/user',$this->userData);
		$response=$this->delete('/api/user/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}