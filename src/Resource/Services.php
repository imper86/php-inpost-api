<?php


namespace Imper86\PhpInpostApi\Resource;


class Services extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/v1/services';
    }
}
