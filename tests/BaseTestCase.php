<?php

namespace WebforceHQ\Tests;

use PHPUnit\Framework\TestCase;
use Thiio\KubernetesApi\KubernetesApiRequest;
use Thiio\KubernetesApi\Requests\CertificateRequest;
use Symfony\Component\Dotenv\Dotenv;

class BaseTestCase extends TestCase
{
    protected $kubernetesEndpoint;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        (new Dotenv())->usePutenv()->bootEnv(dirname(__DIR__).'\.env');
        $this->kubernetesEndpoint = getenv('K8_ENDPOINT');
        $this->token = getenv('K8_TOKEN');

    }
}