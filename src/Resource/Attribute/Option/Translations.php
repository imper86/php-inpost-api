<?php


namespace Imper86\ImmiApi\Resource\Attribute\Option;


use Imper86\ImmiApi\Resource\AbstractResource;
use Imper86\ImmiApi\Resource\GetTrait;

class Translations extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/attribute_option_translations';
    }
}