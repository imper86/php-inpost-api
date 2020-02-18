<?php


namespace Imper86\ImmiApi\Resource;


use Imper86\ImmiApi\Resource\Attribute\Options;
use Imper86\ImmiApi\Resource\Attribute\Translations;

class Attributes extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/attributes';
    }

    public function translations(): Translations
    {
        return new Translations($this->immi);
    }

    public function options(): Options
    {
        return new Options($this->immi);
    }
}