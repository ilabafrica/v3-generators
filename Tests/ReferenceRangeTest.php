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

class ReferenceRangeTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->referencerangeData=array(
        
			"age_type"=>1,
			"text"=>'Sample String',

        );
    
    	$this->updatedreferencerangeData=array(
        
			"age_type"=>1,
			"text"=>'Sample updated String',

        );
    
	}

	public function testStoreReferenceRange()
	{
		$response=$this->json('POST', '/api/referencerange');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListReferenceRange()
	{
		$response=$this->json('GET', '/api/referencerange');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreReferenceRange()
	{
		$this->json('POST', '/api/referencerange',$this->referencerangeData);
		$response=$this->json('POST', '/api/referencerange');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateReferenceRange()
	{
		$this->json('POST', '/api/referencerange',$this->updatedreferencerangeData);
		$response=$this->json('PUT', '/api/referencerange');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteReferenceRange()
	{
		$this->json('POST', '/api/referencerange',$this->referencerangeData);
		$response=$this->delete('/api/referencerange/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}