<?php

namespace Docker\Api\Endpoint;

class SwarmUnlock extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    /**
     * 
     *
     * @param \Docker\Api\Model\SwarmUnlockPostBody $body 
     */
    public function __construct(\Docker\Api\Model\SwarmUnlockPostBody $body)
    {
        $this->body = $body;
    }
    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/swarm/unlock';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\Api\Exception\SwarmUnlockInternalServerErrorException
     * @throws \Docker\Api\Exception\SwarmUnlockServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\SwarmUnlockInternalServerErrorException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Docker\Api\Exception\SwarmUnlockServiceUnavailableException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}