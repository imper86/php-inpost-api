<?php


namespace Imper86\ImmiApi\Resource;


use Imper86\ImmiApi\Resource\Order\InvoiceAddresses;
use Imper86\ImmiApi\Resource\Order\Items;
use Imper86\ImmiApi\Resource\Order\ShippingAddresses;

class Orders extends AbstractResource
{
    use GetTrait, PostTrait, PutTrait, DeleteTrait;

    protected function getBaseUri(): string
    {
        return '/orders';
    }

    public function invoiceAddresses(): InvoiceAddresses
    {
        return new InvoiceAddresses($this->immi);
    }

    public function items(): Items
    {
        return new Items($this->immi);
    }

    public function shippingAddresses(): ShippingAddresses
    {
        return new ShippingAddresses($this->immi);
    }
}