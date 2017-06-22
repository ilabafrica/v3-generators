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

class PanelTypeTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->paneltypeData=array(
        
			"code_id"=>1,
			"status_id"=>1,
			"category_id"=>1,

        );
    
    	$this->updatedpaneltypeData=array(
        
			"code_id"=>1,
			"status_id"=>1,
			"category_id"=>1,

        );
    
	}

	public function testStorePanelType()
	{
		$response=$this->json('POST', '/api/paneltype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListPanelType()
	{
		$response=$this->json('GET', '/api/paneltype');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStorePanelType()
	{
		$this->json('POST', '/api/paneltype',$this->paneltypeData);
		$response=$this->json('POST', '/api/paneltype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdatePanelType()
	{
		$this->json('POST', '/api/paneltype',$this->updatedpaneltypeData);
		$response=$this->json('PUT', '/api/paneltype');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeletePanelType()
	{
		$this->json('POST', '/api/paneltype',$this->paneltypeData);
		$response=$this->delete('/api/paneltype/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}