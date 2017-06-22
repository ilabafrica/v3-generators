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

class PractitionerCommunicationTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->practitionercommunicationData=array(
        
			"language"=>1,

        );
    
    	$this->updatedpractitionercommunicationData=array(
        
			"language"=>1,

        );
    
	}

	public function testStorePractitionerCommunication()
	{
		$response=$this->json('POST', '/api/practitionercommunication');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListPractitionerCommunication()
	{
		$response=$this->json('GET', '/api/practitionercommunication');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStorePractitionerCommunication()
	{
		$this->json('POST', '/api/practitionercommunication',$this->practitionercommunicationData);
		$response=$this->json('POST', '/api/practitionercommunication');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdatePractitionerCommunication()
	{
		$this->json('POST', '/api/practitionercommunication',$this->updatedpractitionercommunicationData);
		$response=$this->json('PUT', '/api/practitionercommunication');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeletePractitionerCommunication()
	{
		$this->json('POST', '/api/practitionercommunication',$this->practitionercommunicationData);
		$response=$this->delete('/api/practitionercommunication/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}