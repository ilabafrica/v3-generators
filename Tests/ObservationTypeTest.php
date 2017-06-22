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

class ObservationTypeTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->observationtypeData=array(
        
			"status_id"=>1,
			"category_id"=>1,
			"code_id"=>1,
			"result_type"=>1,

        );
    
    	$this->updatedobservationtypeData=array(
        
			"status_id"=>1,
			"category_id"=>1,
			"code_id"=>1,
			"result_type"=>1,

        );
    
	}

	public function testStoreObservationType()
	{
		$response=$this->json('POST', '/api/observationtype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListObservationType()
	{
		$response=$this->json('GET', '/api/observationtype');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreObservationType()
	{
		$this->json('POST', '/api/observationtype',$this->observationtypeData);
		$response=$this->json('POST', '/api/observationtype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateObservationType()
	{
		$this->json('POST', '/api/observationtype',$this->updatedobservationtypeData);
		$response=$this->json('PUT', '/api/observationtype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteObservationType()
	{
		$this->json('POST', '/api/observationtype',$this->observationtypeData);
		$response=$this->delete('/api/observationtype/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}