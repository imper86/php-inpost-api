<?php


namespace Imper86\PhpInpostApi\Resource;

use Imper86\PhpInpostApi\Resource\Organizations\AddressBooks;
use Imper86\PhpInpostApi\Resource\Organizations\Batches;
use Imper86\PhpInpostApi\Resource\Organizations\DispatchOrders;
use Imper86\PhpInpostApi\Resource\Organizations\DispatchPoints as DispatchPoints;
use Imper86\PhpInpostApi\Resource\Organizations\FileMappings;
use Imper86\PhpInpostApi\Resource\Organizations\Mpks;
use Imper86\PhpInpostApi\Resource\Organizations\Reports;
use Imper86\PhpInpostApi\Resource\Organizations\Shipments;
use Imper86\PhpInpostApi\Resource\Organizations\ShipmentTemplates as ShipmentTemplates;
use Imper86\PhpInpostApi\Resource\Organizations\Statistics;
use Imper86\PhpInpostApi\Resource\Organizations\Users;

/**
 * Class Organizations
 * @package Imper86\PhpInpostApi\Resource
 *
 * @method AddressBooks addressBooks()
 * @method Batches batches()
 * @method DispatchOrders dispatchOrders()
 * @method DispatchPoints dispatchPoints()
 * @method FileMappings fileMappings()
 * @method Mpks mpks()
 * @method Reports reports()
 * @method Shipments shipments()
 * @method ShipmentTemplates shipmentTemplates()
 * @method Statistics statistics()
 * @method Users users()
 */
class Organizations extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/v1/organizations';
    }
}
