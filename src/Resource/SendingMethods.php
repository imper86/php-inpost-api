<?php


namespace Imper86\PhpInpostApi\Resource;


class SendingMethods extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/v1/sending_methods';
    }
}
