<?php


namespace Imper86\ImmiApi\Resource;


use Imper86\ImmiApi\Resource\Command\CartCheckouts;

class Commands extends AbstractResource
{
    public function cartCheckouts(): CartCheckouts
    {
        return new CartCheckouts($this->immi);
    }
}