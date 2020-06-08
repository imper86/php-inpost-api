<?php


namespace Imper86\PhpInpostApi\Resource\Shipments;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Label extends AbstractResource
{
    public function get(string $shipmentId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/shipments/%s/label', $shipmentId), $query);
    }
}
