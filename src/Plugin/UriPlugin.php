<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 17:29
 */

namespace Imper86\PhpInpostApi\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpInpostApi\Enum\EndpointHost;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriFactoryInterface;

class UriPlugin implements Plugin
{
    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;

    public function __construct(UriFactoryInterface $uriFactory)
    {
        $this->uriFactory = $uriFactory;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();

        if (empty($uri->getHost())) {
            $uri = $uri->withHost(EndpointHost::API);
        }

        return $next($request->withUri($uri->withScheme('https')));
    }
}
