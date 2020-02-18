<?php


namespace Imper86\ImmiApi\Resource\Attribute;


use Imper86\ImmiApi\Resource\AbstractResource;
use Imper86\ImmiApi\Resource\Attribute\Option\Translations as OptionTranslations;
use Imper86\ImmiApi\Resource\GetTrait;

class Options extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/attribute_options';
    }

    public function translations(): OptionTranslations
    {
        return new OptionTranslations($this->immi);
    }
}