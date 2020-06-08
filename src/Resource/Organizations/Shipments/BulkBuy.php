<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\Shipments;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BulkBuy extends AbstractResource
{
    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/shipments/bulk_buy', $organizationId), $body);
    }
}
