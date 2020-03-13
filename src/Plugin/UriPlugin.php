<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 17:29
 */

namespace Imper86\PhpAllegroApi\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Imper86\PhpAllegroApi\Model\CredentialsInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriFactoryInterface;

class UriPlugin implements Plugin
{
    /**
     * @var CredentialsInterface
     */
    private $credentials;
    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;

    public function __construct(CredentialsInterface $credentials, UriFactoryInterface $uriFactory)
    {
        $this->credentials = $credentials;
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
