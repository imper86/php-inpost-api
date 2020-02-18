<?php


namespace Imper86\ImmiApi\Resource\Country;


use Imper86\ImmiApi\Resource\AbstractResource;
use Imper86\ImmiApi\Resource\GetTrait;

class Translations extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/country_translations';
    }
}