<?php


namespace Imper86\ImmiApi\Resource;


class ContactRequests extends AbstractResource
{
    use GetTrait, PostTrait;

    protected function getBaseUri(): string
    {
        return '/contact_requests';
    }
}