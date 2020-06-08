<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\Reports;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Cod extends AbstractResource
{
    public function get(string $organizationId, array $query): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/reports/cod', $organizationId), $query);
    }
}
