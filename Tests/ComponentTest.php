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

class ComponentTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->componentData=array(
        
			"observation_id"=>1,
			"performed_by"=>1,
			"result"=>'Sample String',
			"data_absent_reason"=>1,
			"interpretation"=>1,

        );
    
    	$this->updatedcomponentData=array(
        
			"observation_id"=>1,
			"performed_by"=>1,
			"result"=>'Sample updated String',
			"data_absent_reason"=>1,
			"interpretation"=>1,

        );
    
	}

	public function testStoreComponent()
	{
		$response=$this->json('POST', '/api/component');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListComponent()
	{
		$response=$this->json('GET', '/api/component');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreComponent()
	{
		$this->json('POST', '/api/component',$this->componentData);
		$response=$this->json('POST', '/api/component');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateComponent()
	{
		$this->json('POST', '/api/component',$this->updatedcomponentData);
		$response=$this->json('PUT', '/api/component');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteComponent()
	{
		$this->json('POST', '/api/component',$this->componentData);
		$response=$this->delete('/api/component/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}