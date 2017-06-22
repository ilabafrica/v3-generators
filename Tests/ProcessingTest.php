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

class ProcessingTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->processingData=array(
        
			"description"=>'Sample String',
			"procedure"=>1,

        );
    
    	$this->updatedprocessingData=array(
        
			"description"=>'Sample updated String',
			"procedure"=>1,

        );
    
	}

	public function testStoreProcessing()
	{
		$response=$this->json('POST', '/api/processing');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListProcessing()
	{
		$response=$this->json('GET', '/api/processing');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreProcessing()
	{
		$this->json('POST', '/api/processing',$this->processingData);
		$response=$this->json('POST', '/api/processing');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateProcessing()
	{
		$this->json('POST', '/api/processing',$this->updatedprocessingData);
		$response=$this->json('PUT', '/api/processing');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteProcessing()
	{
		$this->json('POST', '/api/processing',$this->processingData);
		$response=$this->delete('/api/processing/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}