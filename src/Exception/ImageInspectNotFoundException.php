<?php

namespace Docker\Api\Exception;

class ImageInspectNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\Docker\Api\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('No such image', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}