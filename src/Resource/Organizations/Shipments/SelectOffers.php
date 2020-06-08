<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\Shipments;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class SelectOffers extends AbstractResource
{
    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/shipments/select_offers', $organizationId), $body);
    }
}
