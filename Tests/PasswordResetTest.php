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

class PasswordResetTest extends TestCase
{
	 use DatabaseMigrations;


    public function setup(){

    	 parent::Setup();

    	 $this->setVariables();
    }
    
    public function setVariables(){

    
    	$this->passwordresetData=array(
        
			"email"=>'Sample String',
			"token"=>'Sample String',

        );
    
    	$this->updatedpasswordresetData=array(
        
			"email"=>'Sample updated String',
			"token"=>'Sample updated String',

        );
    
	}

	public function testStorePasswordReset()
	{
		$response=$this->json('POST', '/api/passwordreset');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testListPasswordReset()
	{
		$response=$this->json('GET', '/api/passwordreset');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

	public function testStorePasswordReset()
	{
		$this->json('POST', '/api/passwordreset',$this->passwordresetData);
		$response=$this->json('POST', '/api/passwordreset');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testUpdatePasswordReset()
	{
		$this->json('POST', '/api/passwordreset',$this->updatedpasswordresetData);
		$response=$this->json('PUT', '/api/passwordreset');
		$this->assertEquals(200,$response->getStatusCode());
		$this->assertArrayHasKey("subject",$response->original));
	}

	public function testDeletePasswordReset()
	{
		$this->json('POST', '/api/passwordreset',$this->passwordresetData);
		$response=$this->delete('/api/passwordreset/1');
		$this->assertEquals(200,$response->getStatusCode());
		
	}

}