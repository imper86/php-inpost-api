<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Imper86\PhpInpostApi\Resource\Organizations\Shipments\BulkBuy;
use Imper86\PhpInpostApi\Resource\Organizations\Shipments\Calculate;
use Imper86\PhpInpostApi\Resource\Organizations\Shipments\Labels;
use Imper86\PhpInpostApi\Resource\Organizations\Shipments\ReturnLabels;
use Imper86\PhpInpostApi\Resource\Organizations\Shipments\SelectOffers;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Shipments
 * @package Imper86\PhpInpostApi\Resource\Organizations
 *
 * @method BulkBuy bulkBuy()
 * @method Calculate calculate()
 * @method Labels labels()
 * @method ReturnLabels returnLabels()
 * @method SelectOffers selectOffers()
 */
class Shipments extends AbstractResource
{
    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/shipments', $organizationId), $body);
    }

    public function get(string $organizationId, ?string $id = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/v1/organizations/%s/shipments%s', $organizationId, $id ? "/{$id}" : ''),
            $query
        );
    }
}
