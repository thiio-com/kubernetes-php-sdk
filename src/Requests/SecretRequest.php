<?php

namespace Thiio\KubernetesApi\Requests;

use Thiio\KubernetesApi\Models\Certificate;
use Thiio\KubernetesApi\Models\Ingress;
use Thiio\KubernetesApi\Models\Secret;
use Thiio\KubernetesApi\Requests\Helpers\KubeResponse;

class SecretRequest extends KubeRequest
{
    const resource      = "secrets";
    const apiVersion    = "v1";
    const api           = "api";

    public function __construct($token, $baseEndpoint, $namespace)
    {
        parent::__construct($token, $baseEndpoint, self::api, self::apiVersion, $namespace, self::resource);
    }

    public function show($name): KubeResponse
    {
        return $this->get("/" . $name)->sendRequest();
    }

    public function list(): KubeResponse
    {
        return $this->get()->sendRequest();
    }

    public function create(Secret $secret): KubeResponse
    {
        return $this->post($secret->toArray())->sendRequest();
    }

    public function destroy(string $name): KubeResponse
    {
        return $this->delete("/" . $name)->sendRequest();
    }

    public function update(Secret $secret): KubeResponse
    {
        $name  = $secret->getMetadata()->getName();
        return $this->put("/" . $name, $secret->toArray())->sendRequest();
    }
}
