<?php


namespace Imper86\PhpInpostApi\Resource\Tracking;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ServiceHistory extends AbstractResource
{
    public function get(string $trackingNumber, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/tracking/%s/service_history', $trackingNumber), $query);
    }
}
