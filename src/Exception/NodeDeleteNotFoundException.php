<?php

namespace Docker\Api\Exception;

class NodeDeleteNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\Docker\Api\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('no such node', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}