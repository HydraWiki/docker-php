<?php

namespace Docker\Api\Endpoint;

class NetworkCreate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    /**
     * 
     *
     * @param \Docker\Api\Model\NetworksCreatePostBody $networkConfig Network configuration
     */
    public function __construct(\Docker\Api\Model\NetworksCreatePostBody $networkConfig)
    {
        $this->body = $networkConfig;
    }
    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/networks/create';
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
     * @throws \Docker\Api\Exception\NetworkCreateForbiddenException
     * @throws \Docker\Api\Exception\NetworkCreateNotFoundException
     * @throws \Docker\Api\Exception\NetworkCreateInternalServerErrorException
     *
     * @return null|\Docker\Api\Model\NetworksCreatePostResponse201
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'Docker\\Api\\Model\\NetworksCreatePostResponse201', 'json');
        }
        if (403 === $status) {
            throw new \Docker\Api\Exception\NetworkCreateForbiddenException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \Docker\Api\Exception\NetworkCreateNotFoundException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\NetworkCreateInternalServerErrorException($serializer->deserialize($body, 'Docker\\Api\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}