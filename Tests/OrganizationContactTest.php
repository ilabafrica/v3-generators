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

class OrganizationContactTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->organizationcontactData=array(
        
			"purpose"=>1,

        );
    
    	$this->updatedorganizationcontactData=array(
        
			"purpose"=>1,

        );
    
	}

	public function testStoreOrganizationContact()
	{
		$response=$this->json('POST', '/api/organizationcontact');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListOrganizationContact()
	{
		$response=$this->json('GET', '/api/organizationcontact');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStoreOrganizationContact()
	{
		$this->json('POST', '/api/organizationcontact',$this->organizationcontactData);
		$response=$this->json('POST', '/api/organizationcontact');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdateOrganizationContact()
	{
		$this->json('POST', '/api/organizationcontact',$this->updatedorganizationcontactData);
		$response=$this->json('PUT', '/api/organizationcontact');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeleteOrganizationContact()
	{
		$this->json('POST', '/api/organizationcontact',$this->organizationcontactData);
		$response=$this->delete('/api/organizationcontact/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}