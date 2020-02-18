<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 14:40
 */

namespace Imper86\ImmiApi\Resource;

use Imper86\ImmiApi\ImmiInterface;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

abstract class AbstractResource implements ResourceInterface
{
    /**
     * @var ImmiInterface
     */
    protected $immi;
    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;
    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;
    /**
     * @var HttpClientInterface
     */
    private $httpClient;
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;


    public function __construct(ImmiInterface $immi)
    {
        $this->immi = $immi;
        $this->requestFactory = $immi->getHttpClientBuilder()->getRequestFactory();
        $this->uriFactory = $immi->getHttpClientBuilder()->getUriFactory();
        $this->streamFactory = $immi->getHttpClientBuilder()->getStreamFactory();
        $this->httpClient = $immi->getHttpClientBuilder()->getHttpClient();
    }

    protected function apiGet(string $uri, ?array $query = null): ?array
    {
        $uri = $this->uriFactory->createUri($uri);

        if ($query) {
            $uri = $uri->withQuery(http_build_query($query));
        }

        $request = $this->requestFactory->createRequest('GET', $uri);
        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    protected function apiPost(string $uri, ?array $body = null): ?array
    {
        $request = $this->requestFactory->createRequest('POST', $uri);

        if ($body) {
            $stream = $this->streamFactory->createStream(json_encode($body));
            $request = $request->withBody($stream);
        }

        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    protected function apiPut(string $uri, ?array $body = null): ?array
    {
        $request = $this->requestFactory->createRequest('PUT', $uri);

        if ($body) {
            $stream = $this->streamFactory->createStream(json_encode($body));
            $request = $request->withBody($stream);
        }

        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    protected function apiDelete(string $uri): ?array
    {
        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    private function transformResponse(ResponseInterface $response): ?array
    {
        return json_decode($response->getBody()->__toString(), true);
    }
}
