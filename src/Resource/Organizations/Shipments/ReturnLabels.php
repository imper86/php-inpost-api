<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\Shipments;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ReturnLabels extends AbstractResource
{
    public function get(string $organizationId, array $query): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/shipments/return_labels', $organizationId), $query);
    }
}
