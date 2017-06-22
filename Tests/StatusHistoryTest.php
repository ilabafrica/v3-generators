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

class StatusHistoryTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->statushistoryData=array(
        
			"code"=>1,
			"episode_of_care_id"=>1,

        );
    
    	$this->updatedstatushistoryData=array(
        
			"code"=>1,
			"episode_of_care_id"=>1,

        );
    
	}

	public function testStoreStatusHistory()
	{
		$response=$this->json('POST', '/api/statushistory');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListStatusHistory()
	{
		$response=$this->json('GET', '/api/statushistory');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreStatusHistory()
	{
		$this->json('POST', '/api/statushistory',$this->statushistoryData);
		$response=$this->json('POST', '/api/statushistory');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateStatusHistory()
	{
		$this->json('POST', '/api/statushistory',$this->updatedstatushistoryData);
		$response=$this->json('PUT', '/api/statushistory');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteStatusHistory()
	{
		$this->json('POST', '/api/statushistory',$this->statushistoryData);
		$response=$this->delete('/api/statushistory/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}