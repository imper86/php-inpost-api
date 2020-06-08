<?php


namespace Imper86\PhpInpostApi\Resource;


class Statuses extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/v1/statuses';
    }
}
