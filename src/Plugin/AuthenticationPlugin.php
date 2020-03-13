<?php


namespace Imper86\PhpAllegroApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpAllegroApi\Enum\GrantType;
use Imper86\PhpAllegroApi\Model\TokenInterface;
use Imper86\PhpAllegroApi\Oauth\OauthClientInterface;
use Imper86\PhpAllegroApi\Oauth\TokenRepositoryInterface;
use Psr\Http\Message\RequestInterface;
use RuntimeException;

class AuthenticationPlugin implements Plugin
{
    /**
     * @var TokenRepositoryInterface
     */
    private $tokenRepository;
    /**
     * @var OauthClientInterface
     */
    private $oauthClient;

    public function __construct(TokenRepositoryInterface $tokenRepository, OauthClientInterface $oauthClient)
    {
        $this->tokenRepository = $tokenRepository;
        $this->oauthClient = $oauthClient;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $token = $this->tokenRepository->load();

        if ($request->hasHeader('Authorization') || !$token) {
            return $next($request);
        }

        if ($token->isExpired()) {
            $token = $this->handleExpired($token);
        }

        return $next($request->withHeader('Authorization', sprintf('Bearer %s', $token->__toString())));
    }

    private function handleExpired(TokenInterface $token): TokenInterface
    {
        if ($token->getRefreshToken()) {
            return $this->oauthClient->fetchTokenWithRefreshToken($token->getRefreshToken());
        }

        if (GrantType::CLIENT_CREDENTIALS === $token->getGrantType()) {
            return $this->oauthClient->fetchTokenWithClientCredentials();
        }

        throw new RuntimeException("Can't find a way to refresh expired token");
    }
}