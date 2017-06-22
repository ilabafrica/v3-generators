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

class CodingTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->codingData=array(
        
			"uri"=>'Sample String',
			"version"=>'Sample String',
			"code"=>'Sample String',
			"display"=>'Sample String',

        );
    
    	$this->updatedcodingData=array(
        
			"uri"=>'Sample updated String',
			"version"=>'Sample updated String',
			"code"=>'Sample updated String',
			"display"=>'Sample updated String',

        );
    
	}

	public function testStoreCoding()
	{
		$response=$this->json('POST', '/api/coding');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListCoding()
	{
		$response=$this->json('GET', '/api/coding');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreCoding()
	{
		$this->json('POST', '/api/coding',$this->codingData);
		$response=$this->json('POST', '/api/coding');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateCoding()
	{
		$this->json('POST', '/api/coding',$this->updatedcodingData);
		$response=$this->json('PUT', '/api/coding');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteCoding()
	{
		$this->json('POST', '/api/coding',$this->codingData);
		$response=$this->delete('/api/coding/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}