<?php


namespace Imper86\ImmiApi\Resource\Order;


use Imper86\ImmiApi\Resource\AbstractResource;
use Imper86\ImmiApi\Resource\DeleteTrait;
use Imper86\ImmiApi\Resource\GetTrait;
use Imper86\ImmiApi\Resource\PostTrait;
use Imper86\ImmiApi\Resource\PutTrait;

class ShippingAddresses extends AbstractResource
{
    use GetTrait, PostTrait, PutTrait, DeleteTrait;

    protected function getBaseUri(): string
    {
        return '/order_shipping_addresses';
    }
}