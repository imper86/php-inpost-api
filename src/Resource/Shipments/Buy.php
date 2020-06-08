<?php


namespace Imper86\PhpInpostApi\Resource\Shipments;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Buy extends AbstractResource
{
    public function post(string $shipmentId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/shipments/%s/buy', $shipmentId), $body);
    }
}
