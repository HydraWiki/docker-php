<?php

namespace Docker\Api\Exception;

class PluginSetNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\Docker\Api\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Plugin not installed', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}