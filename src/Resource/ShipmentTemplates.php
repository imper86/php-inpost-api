<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

class ShipmentTemplates extends AbstractResource
{
    use DeleteTrait, PutTrait;

    public function get(string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/shipment_templates/%s', $id), $query);
    }

    protected function getBaseUri(): string
    {
        return '/v1/shipment_templates';
    }
}
