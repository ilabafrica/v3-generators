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

class EpisodeOfCareDiagnosisTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->episodeofcarediagnosisData=array(
        
			"condition"=>'Sample String',
			"role"=>'Sample String',
			"rank"=>'Sample String',
			"episode_of_care_id"=>1,

        );
    
    	$this->updatedepisodeofcarediagnosisData=array(
        
			"condition"=>'Sample updated String',
			"role"=>'Sample updated String',
			"rank"=>'Sample updated String',
			"episode_of_care_id"=>1,

        );
    
	}

	public function testStoreEpisodeOfCareDiagnosis()
	{
		$response=$this->json('POST', '/api/episodeofcarediagnosis');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListEpisodeOfCareDiagnosis()
	{
		$response=$this->json('GET', '/api/episodeofcarediagnosis');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreEpisodeOfCareDiagnosis()
	{
		$this->json('POST', '/api/episodeofcarediagnosis',$this->episodeofcarediagnosisData);
		$response=$this->json('POST', '/api/episodeofcarediagnosis');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateEpisodeOfCareDiagnosis()
	{
		$this->json('POST', '/api/episodeofcarediagnosis',$this->updatedepisodeofcarediagnosisData);
		$response=$this->json('PUT', '/api/episodeofcarediagnosis');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteEpisodeOfCareDiagnosis()
	{
		$this->json('POST', '/api/episodeofcarediagnosis',$this->episodeofcarediagnosisData);
		$response=$this->delete('/api/episodeofcarediagnosis/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}