<?php


namespace Imper86\ImmiApi\Resource;


use Imper86\ImmiApi\Resource\Cart\Items;

class Carts extends AbstractResource
{
    use GetTrait, PostTrait, PutTrait;

    protected function getBaseUri(): string
    {
        return '/carts';
    }

    public function items(): Items
    {
        return new Items($this->immi);
    }
}