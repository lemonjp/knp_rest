<?php

namespace KnpU\CodeBattle\Tests;

use Guzzle\Http\Client;

class ProgrammerControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testPOST()
    {
        // create our http client (Guzzle)
        $client = new Client('http://0.0.0.0:8001', array(
            'request.options' => array(
                'exceptions' => false,
            )
        ));

        $nickname = 'ObjectOrienter'.rand(0,999);
        $data = array(
          'nickname' => $nickname,
          'avatarNumber' => 2,
          'tagLine' => 'a test dev5!'
        );

        $request = $client->post('/api/programmers',null,json_encode($data));
        $response = $request->send();

        // assert
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertTrue($response->hasHeader('Location'));
        $data = json_decode($response->getBody(true),true);
        $this->assertArrayHasKey('nickname',$data);
    }

}
