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

class ContainerTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->containerData=array(
        
			"description"=>'Sample String',
			"type"=>1,
			"quantity_id"=>1,
			"additive"=>1,

        );
    
    	$this->updatedcontainerData=array(
        
			"description"=>'Sample updated String',
			"type"=>1,
			"quantity_id"=>1,
			"additive"=>1,

        );
    
	}

	public function testStoreContainer()
	{
		$response=$this->json('POST', '/api/container');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListContainer()
	{
		$response=$this->json('GET', '/api/container');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreContainer()
	{
		$this->json('POST', '/api/container',$this->containerData);
		$response=$this->json('POST', '/api/container');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateContainer()
	{
		$this->json('POST', '/api/container',$this->updatedcontainerData);
		$response=$this->json('PUT', '/api/container');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteContainer()
	{
		$this->json('POST', '/api/container',$this->containerData);
		$response=$this->delete('/api/container/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}