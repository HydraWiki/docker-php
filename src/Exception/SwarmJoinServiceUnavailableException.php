<?php

namespace Docker\Api\Exception;

class SwarmJoinServiceUnavailableException extends \RuntimeException implements ServerException
{
    private $errorResponse;
    public function __construct(\Docker\Api\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('node is already part of a swarm', 503);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}