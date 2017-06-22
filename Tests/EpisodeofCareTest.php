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

class EpisodeofCareTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->episodeofcareData=array(
        
			"status"=>1,
			"type"=>1,
			"patient"=>1,
			"organization_id"=>1,
			"practitioners_id"=>1,
			"team_id"=>1,

        );
    
    	$this->updatedepisodeofcareData=array(
        
			"status"=>1,
			"type"=>1,
			"patient"=>1,
			"organization_id"=>1,
			"practitioners_id"=>1,
			"team_id"=>1,

        );
    
	}

	public function testStoreEpisodeofCare()
	{
		$response=$this->json('POST', '/api/episodeofcare');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListEpisodeofCare()
	{
		$response=$this->json('GET', '/api/episodeofcare');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreEpisodeofCare()
	{
		$this->json('POST', '/api/episodeofcare',$this->episodeofcareData);
		$response=$this->json('POST', '/api/episodeofcare');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateEpisodeofCare()
	{
		$this->json('POST', '/api/episodeofcare',$this->updatedepisodeofcareData);
		$response=$this->json('PUT', '/api/episodeofcare');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteEpisodeofCare()
	{
		$this->json('POST', '/api/episodeofcare',$this->episodeofcareData);
		$response=$this->delete('/api/episodeofcare/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}