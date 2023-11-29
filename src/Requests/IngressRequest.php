<?php

namespace Thiio\KubernetesApi\Requests;

use Thiio\KubernetesApi\Models\Ingress;
use Thiio\KubernetesApi\Requests\Helpers\KubeResponse;

class IngressRequest extends KubeRequest
{
    const resource      = "ingresses";
    const apiVersion    = "networking.k8s.io/v1";
    const api           = "apis";

    public function __construct($token, $baseEndpoint, $namespace)
    {
        parent::__construct($token, $baseEndpoint, self::api, self::apiVersion, $namespace, self::resource);
    }

    public function show($ingressName): KubeResponse
    {
        return $this->get("/" . $ingressName)->sendRequest();
    }

    public function list(): KubeResponse
    {
        return $this->get()->sendRequest();
    }

    public function create(Ingress $ingress): KubeResponse
    {
        return $this->post($ingress->toArray())->sendRequest();
    }

    public function destroy(string $ingressName): KubeResponse
    {
        return $this->delete("/" . $ingressName)->sendRequest();
    }

    public function update(Ingress $ingress): KubeResponse
    {
        $name  = $ingress->getMetadata()->getName();
        return $this->put("/" . $name, $ingress->toArray())->sendRequest();
    }
}
