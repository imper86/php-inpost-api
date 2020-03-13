<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Images extends AbstractResource
{
    public function postWithUrl(array $body): ResponseInterface
    {
        return $this->postWithStream(
            $this->streamFactory->createStream(json_encode($body)),
            ContentType::VND_PUBLIC_V1
        );
    }

    public function postWithStream(StreamInterface $stream, string $contentType): ResponseInterface
    {
        $uri = $this->uriFactory->createUri('/sale/images')
            ->withHost(EndpointHost::UPLOAD);
        $request = $this->requestFactory->createRequest('POST', $uri)
            ->withBody($stream)
            ->withHeader('Content-Type', $contentType);

        return $this->httpClient->sendRequest($request);
    }
}