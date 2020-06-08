<?php


namespace Imper86\PhpInpostApi\Resource;

use Imper86\PhpInpostApi\Resource\Shipments\Buy;
use Imper86\PhpInpostApi\Resource\Shipments\Label;
use Imper86\PhpInpostApi\Resource\Shipments\SelectOffer;

/**
 * Class Shipments
 * @package Imper86\PhpInpostApi\Resource
 *
 * @method Buy buy()
 * @method Label label()
 * @method SelectOffer selectOffer()
 */
class Shipments extends AbstractResource
{
    use DeleteTrait, PutTrait;

    protected function getBaseUri(): string
    {
        return '/v1/shipments';
    }
}
