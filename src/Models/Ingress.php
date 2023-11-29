<?php

namespace Thiio\KubernetesApi\Models;

use Thiio\KubernetesApi\Models\Helpers\Validations;
use Thiio\KubernetesApi\Models\IngressResources\IngressRule;
use Thiio\KubernetesApi\Models\IngressResources\IngressTls;
use Thiio\KubernetesApi\Models\ResourceModel;

class Ingress extends ResourceModel
{
    use Validations;

    protected $kind = "Ingress";
    protected $apiVersion = "networking.k8s.io/v1";
    protected array $spec = [];
    // 'tls'    => null,
    // 'rules'  => null,

    public function __construct($resourceName)
    {
        parent::__construct($resourceName);
    }

    public function setRules(array $rules)
    {
        $this->allObjectsAreValidClass([IngressRule::class], $rules);
        if ($this->getSpec() == null) {
            $this->setSpec([]);
        }
        $spec = $this->getSpec();
        $spec['rules'] = $rules;
        $this->setSpec($spec);
        return $this;
    }

    public function setTls(array $tls)
    {
        $this->allObjectsAreValidClass([IngressTls::class], $tls);
        if ($this->getSpec() == null) {
            $this->setSpec([]);
        }
        $spec = $this->getSpec();
        $spec['tls'] = $tls;
        $this->setSpec($spec);
        return $this;
    }


    public function generateTlsForEveryDomain()
    {
        return $this;
    }
}
