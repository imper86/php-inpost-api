<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ShipmentTemplates extends AbstractResource
{
    public function get(string $organizationId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/shipment_templates', $organizationId), $query);
    }

    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/shipment_templates', $organizationId), $body);
    }
}
