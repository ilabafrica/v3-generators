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

class SubstanceTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->substanceData=array(
        
			"status"=>1,
			"category"=>1,
			"code"=>1,
			"description"=>'Sample String',

        );
    
    	$this->updatedsubstanceData=array(
        
			"status"=>1,
			"category"=>1,
			"code"=>1,
			"description"=>'Sample updated String',

        );
    
	}

	public function testStoreSubstance()
	{
		$response=$this->json('POST', '/api/substance');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListSubstance()
	{
		$response=$this->json('GET', '/api/substance');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreSubstance()
	{
		$this->json('POST', '/api/substance',$this->substanceData);
		$response=$this->json('POST', '/api/substance');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateSubstance()
	{
		$this->json('POST', '/api/substance',$this->updatedsubstanceData);
		$response=$this->json('PUT', '/api/substance');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteSubstance()
	{
		$this->json('POST', '/api/substance',$this->substanceData);
		$response=$this->delete('/api/substance/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}