<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpInpostApi\Enum\GrantType;
use Imper86\PhpInpostApi\Model\TokenInterface;
use Imper86\PhpInpostApi\Oauth\OauthClientInterface;
use Imper86\PhpInpostApi\Oauth\TokenRepositoryInterface;
use Psr\Http\Message\RequestInterface;
use RuntimeException;

class AuthenticationPlugin implements Plugin
{
    /**
     * @var string
     */
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if ($request->hasHeader('Authorization')) {
            return $next($request);
        }

        return $next($request->withHeader('Authorization', sprintf('Bearer %s', $this->token)));
    }
}
