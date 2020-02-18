<?php


namespace Imper86\ImmiApi\Resource;


use Imper86\ImmiApi\Resource\Country\Translations;

class Countries extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/countries';
    }

    public function translations(): Translations
    {
        return new Translations($this->immi);
    }
}