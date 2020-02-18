<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:44
 */

namespace Imper86\ImmiApi\Oauth;

use Imper86\OauthClient\Constants\ContentType;
use Imper86\OauthClient\Constants\TokenEndpointCredentialsPlace;
use Imper86\OauthClient\Constants\TokenEndpointParamsPlace;
use Imper86\OauthClient\Model\CredentialsInterface;
use Imper86\OauthClient\OauthClient as BaseOauthClient;
use Imper86\OauthClient\Repository\TokenRepositoryInterface;
use Psr\Http\Message\UriFactoryInterface;

class OauthClient extends BaseOauthClient
{
    public function __construct(
        CredentialsInterface $credentials,
        UriFactoryInterface $uriFactory,
        ?TokenRepositoryInterface $tokenRepository
    )
    {
        $baseUri = $uriFactory->createUri($credentials->getBaseUri() ?? 'https://api.b2b.immi.shop');

        parent::__construct([
            'token_endpoint' => [
                'url' => $baseUri->withPath('/oauth/v2/token')->__toString(),
                'method' => 'POST',
                'params_place' => TokenEndpointParamsPlace::BODY,
                'credentials_place' => TokenEndpointCredentialsPlace::HEADER_BASIC_AUTH,
                'content_type' => ContentType::FORM_URLENCODED,
                'accept' => ContentType::JSON,
            ],
            'authorize_endpoint' => [
                'url' => $baseUri->withPath('/oauth/v2/authorize')->__toString(),
                'scope_delimiter' => ' ',
            ],
            'token_repository' => $tokenRepository,
            'credentials' => $credentials,
            'token_factory' => new TokenFactory(),
        ]);
    }
}
