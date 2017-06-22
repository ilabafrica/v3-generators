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

class QuantityTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->quantityData=array(
        
			"value"=>'Sample String',
			"comparator"=>'Sample String',
			"unit"=>'Sample String',
			"system"=>'Sample String',
			"code"=>'Sample String',

        );
    
    	$this->updatedquantityData=array(
        
			"value"=>'Sample updated String',
			"comparator"=>'Sample updated String',
			"unit"=>'Sample updated String',
			"system"=>'Sample updated String',
			"code"=>'Sample updated String',

        );
    
	}

	public function testStoreQuantity()
	{
		$response=$this->json('POST', '/api/quantity');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListQuantity()
	{
		$response=$this->json('GET', '/api/quantity');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreQuantity()
	{
		$this->json('POST', '/api/quantity',$this->quantityData);
		$response=$this->json('POST', '/api/quantity');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateQuantity()
	{
		$this->json('POST', '/api/quantity',$this->updatedquantityData);
		$response=$this->json('PUT', '/api/quantity');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteQuantity()
	{
		$this->json('POST', '/api/quantity',$this->quantityData);
		$response=$this->delete('/api/quantity/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}