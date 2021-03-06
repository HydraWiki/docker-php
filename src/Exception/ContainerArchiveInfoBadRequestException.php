<?php

namespace Docker\Api\Exception;

class ContainerArchiveInfoBadRequestException extends \RuntimeException implements ClientException
{
    private $containersIdArchiveHeadResponse400;
    public function __construct(\Docker\Api\Model\ContainersIdArchiveHeadResponse400 $containersIdArchiveHeadResponse400)
    {
        parent::__construct('Bad parameter', 400);
        $this->containersIdArchiveHeadResponse400 = $containersIdArchiveHeadResponse400;
    }
    public function getContainersIdArchiveHeadResponse400()
    {
        return $this->containersIdArchiveHeadResponse400;
    }
}