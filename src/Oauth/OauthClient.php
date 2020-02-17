<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:44
 */

namespace Imper86\AsanaApi\Oauth;

use Imper86\OauthClient\Constants\ContentType;
use Imper86\OauthClient\Constants\TokenEndpointCredentialsPlace;
use Imper86\OauthClient\Constants\TokenEndpointParamsPlace;
use Imper86\OauthClient\Model\CredentialsInterface;
use Imper86\OauthClient\OauthClient as BaseOauthClient;
use Imper86\OauthClient\Repository\TokenRepositoryInterface;

class OauthClient extends BaseOauthClient
{
    public function __construct(CredentialsInterface $credentials, ?TokenRepositoryInterface $tokenRepository)
    {
        parent::__construct([
            'token_endpoint' => [
                'url' => 'https://app.asana.com/-/oauth_token',
                'method' => 'POST',
                'params_place' => TokenEndpointParamsPlace::BODY,
                'credentials_place' => TokenEndpointCredentialsPlace::QUERY,
                'content_type' => ContentType::FORM_URLENCODED,
                'accept' => ContentType::JSON,
            ],
            'authorize_endpoint' => [
                'url' => 'https://app.asana.com/-/oauth_authorize',
                'scope_delimiter' => ' ',
            ],
            'token_repository' => $tokenRepository,
            'credentials' => $credentials,
            'token_factory' => new TokenFactory(),
        ]);
    }
}
