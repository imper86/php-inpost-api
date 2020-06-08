<?php


namespace Imper86\PhpInpostApi\Resource;


class Batches extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/v1/batches';
    }
}
