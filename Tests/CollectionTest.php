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

class CollectionTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->collectionData=array(
        
			"collector"=>1,
			"quantity_id"=>1,
			"method"=>1,
			"body_site"=>1,

        );
    
    	$this->updatedcollectionData=array(
        
			"collector"=>1,
			"quantity_id"=>1,
			"method"=>1,
			"body_site"=>1,

        );
    
	}

	public function testStoreCollection()
	{
		$response=$this->json('POST', '/api/collection');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListCollection()
	{
		$response=$this->json('GET', '/api/collection');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreCollection()
	{
		$this->json('POST', '/api/collection',$this->collectionData);
		$response=$this->json('POST', '/api/collection');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateCollection()
	{
		$this->json('POST', '/api/collection',$this->updatedcollectionData);
		$response=$this->json('PUT', '/api/collection');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteCollection()
	{
		$this->json('POST', '/api/collection',$this->collectionData);
		$response=$this->delete('/api/collection/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}