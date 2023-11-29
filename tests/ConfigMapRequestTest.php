<?php

use PHPUnit\Framework\TestCase;
use Thiio\KubernetesApi\KubernetesApiRequest;
use Thiio\KubernetesApi\Models\ConfigMap;
use Thiio\KubernetesApi\Requests\ConfigMapRequest;

class ConfigMapRequestTest extends BaseTestCase 
{ 
    
    private ConfigMapRequest $api;

    function setUp(): void
    {
        parent::setUp();
        $request = new KubernetesApiRequest($this->kubernetesEndpoint, $this->token);
        $this->api = $request->configMapApi();                
    }
    /** @test */
    function list()
    {                
        $response = $this->api->list();
        // echo json_encode($response->body);
        $this->assertTrue($response->success);
    }

    /** @test */
    function create()
    {   
        $config = new ConfigMap("test");
        $config->setData(['user' => "jcortes@webforcehq.com"]);
        $response = $this->api->create($config);
        // echo json_encode($response->body);
        $this->assertTrue($response->success);
    }

    /** @test */
    function show()
    {                
        $response = $this->api->show("test");
        // echo json_encode($response->body);
        $this->assertTrue($response->success);
    }    

    /** @test */
    function update()
    {                                
        $config = new ConfigMap("test");
        $config->setData([
            '.env'      => "
                EMAIL=jcortes@webforcehq.com
                PASSWORD=jcortes@webforcehq.com
            "
        ]);
        $response = $this->api->update($config);
        // echo json_encode($response->body);
        $this->assertTrue($response->success);
    }

    /** @test */
    function delete()
    {                
        $response = $this->api->destroy("test");
        // echo json_encode($response->body);
        $this->assertTrue($response->success);
    }

    
}