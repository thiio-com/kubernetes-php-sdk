<?php

namespace Thiio\KubernetesApi\Models;

use Thiio\KubernetesApi\Models\Helpers\Validations;
use Thiio\KubernetesApi\Models\ResourceModel;

class ConfigMap extends ResourceModel
{
    protected $kind = "ConfigMap";
    protected $apiVersion = "v1";
    protected $data;

    public function __construct($resourceName)
    {
        parent::__construct($resourceName);
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}
