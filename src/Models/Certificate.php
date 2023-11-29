<?php

namespace Thiio\KubernetesApi\Models;

use Thiio\KubernetesApi\Models\Helpers\Validations;
use Thiio\KubernetesApi\Models\ResourceModel;

class Certificate extends ResourceModel
{
    protected $kind = "Certificate";
    protected $apiVersion = "extensions/v1beta1";

    public function __construct($resourceName)
    {
        parent::__construct($resourceName);
    }
    
}
