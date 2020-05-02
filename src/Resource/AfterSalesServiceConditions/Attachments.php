<?php


namespace Imper86\PhpAllegroApi\Resource\AfterSalesServiceConditions;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Attachments extends AbstractResource
{
    public function post(string $fileName): ResponseInterface
    {
        return $this->apiPost('/after-sales-service-conditions/attachments', ['name' => $fileName]);
    }

    public function put(string $url, StreamInterface $fileStream, string $contentType = 'application/pdf'): ResponseInterface
    {
        $uri = $this->uriFactory->createUri($url);
        $request = $this->requestFactory->createRequest('PUT', $uri)
            ->withBody($fileStream)
            ->withHeader('Content-Type', $contentType);

        return $this->httpClient->sendRequest($request);
    }
}
