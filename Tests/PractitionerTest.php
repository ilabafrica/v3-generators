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

class PractitionerTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->practitionerData=array(
        
			"user_id"=>1,
			"gender"=>1,
			"birth_date"=>'2017:12:12 15:30:00',
			"photo"=>'Sample String',

        );
    
    	$this->updatedpractitionerData=array(
        
			"user_id"=>1,
			"gender"=>1,
			"birth_date"=>'2016:12:12 15:30:00',
			"photo"=>'Sample updated String',

        );
    
	}

	public function testStorePractitioner()
	{
		$response=$this->json('POST', '/api/practitioner');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListPractitioner()
	{
		$response=$this->json('GET', '/api/practitioner');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStorePractitioner()
	{
		$this->json('POST', '/api/practitioner',$this->practitionerData);
		$response=$this->json('POST', '/api/practitioner');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdatePractitioner()
	{
		$this->json('POST', '/api/practitioner',$this->updatedpractitionerData);
		$response=$this->json('PUT', '/api/practitioner');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeletePractitioner()
	{
		$this->json('POST', '/api/practitioner',$this->practitionerData);
		$response=$this->delete('/api/practitioner/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}