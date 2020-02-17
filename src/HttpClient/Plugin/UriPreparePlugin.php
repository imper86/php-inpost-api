<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 17:29
 */

namespace Imper86\AsanaApi\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class UriPreparePlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();

        if (empty($uri->getHost())) {
            $uri = $uri->withHost('api.asana.com');
        }

        if ('https' !== $uri->getScheme()) {
            $uri = $uri->withScheme('https');
        }

        $basePath = '/api/1.0';

        if (substr($uri->getPath(), 0, strlen($basePath)) !== $basePath) {
            $uri = $uri->withPath("{$basePath}{$uri->getPath()}");
        }

        if ($uri !== $request->getUri()) {
            $request = $request->withUri($uri);
        }

        return $next($request);
    }
}
