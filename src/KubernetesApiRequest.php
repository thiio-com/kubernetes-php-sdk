<?php

namespace Thiio\KubernetesApi;

use Thiio\KubernetesApi\Requests\CertificateRequest;
use Thiio\KubernetesApi\Requests\ConfigMapRequest;
use Thiio\KubernetesApi\Requests\IngressRequest;
use Thiio\KubernetesApi\Requests\RawRequest;
use Thiio\KubernetesApi\Requests\SecretRequest;

class KubernetesApiRequest
{
    protected $token;
    protected $endpoint;
    protected $namespace;
    
    public function __construct($endpoint, $token, $namespace = 'default')
    {
        $this->endpoint     = $endpoint;
        $this->token        = $token;
        $this->namespace    = $namespace;
    }

    public function ingressApi($namespace = null): IngressRequest
    {
        return new IngressRequest($this->token, $this->endpoint, $this->chooseNamespace($namespace));
    }

    public function certificatesApi($namespace = null): CertificateRequest
    {
        return new CertificateRequest($this->token, $this->endpoint, $this->chooseNamespace($namespace));
    }

    public function secretsApi($namespace = null): SecretRequest
    {
        return new SecretRequest($this->token, $this->endpoint, $this->chooseNamespace($namespace));
    }

    public function configMapApi($namespace = null): ConfigMapRequest
    {
        return new ConfigMapRequest($this->token, $this->endpoint, $this->chooseNamespace($namespace));
    }

    public function rawApi(): RawRequest
    {
        return new RawRequest($this->token, $this->endpoint);
    }

    private function chooseNamespace($namespace)
    {
        if ($namespace == null) {
            return $this->namespace;
        } else {
            return $namespace;
        }
    }
}
