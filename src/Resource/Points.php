<?php


namespace Imper86\PhpInpostApi\Resource;


class Points extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/v1/points';
    }
}
