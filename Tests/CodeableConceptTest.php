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

class CodeableConceptTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->codeableconceptData=array(
        
			"code"=>'Sample String',
			"description"=>'Sample String',

        );
    
    	$this->updatedcodeableconceptData=array(
        
			"code"=>'Sample updated String',
			"description"=>'Sample updated String',

        );
    
	}

	public function testStoreCodeableConcept()
	{
		$response=$this->json('POST', '/api/codeableconcept');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListCodeableConcept()
	{
		$response=$this->json('GET', '/api/codeableconcept');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreCodeableConcept()
	{
		$this->json('POST', '/api/codeableconcept',$this->codeableconceptData);
		$response=$this->json('POST', '/api/codeableconcept');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateCodeableConcept()
	{
		$this->json('POST', '/api/codeableconcept',$this->updatedcodeableconceptData);
		$response=$this->json('PUT', '/api/codeableconcept');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteCodeableConcept()
	{
		$this->json('POST', '/api/codeableconcept',$this->codeableconceptData);
		$response=$this->delete('/api/codeableconcept/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}