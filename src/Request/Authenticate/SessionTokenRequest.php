<?php

namespace Fiyo\Mattermost\Request\Authenticate;


use Fiyo\Mattermost\Entity\Authorization;
use Fiyo\Mattermost\Exception\UnauthorizedException;
use Fiyo\Mattermost\Request\AbstractPostRequest;
use Fiyo\Mattermost\Session;
use GuzzleHttp\Psr7\Response;

/**
 * Class SessionTokenRequest
 */
class SessionTokenRequest extends AbstractPostRequest
{
    const ENDPOINT = '/users/login';

    const FIELD_LOGIN_ID = 'login_id';
    const FIELD_PASSWORD = 'password';

    const HEADER_TOKEN = 'Token';

    /**
     * @var Session
     */
    protected $session;

    /**
     * SessionTokenRequest constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return [
            self::FIELD_LOGIN_ID => $this->session->getLoginId(),
            self::FIELD_PASSWORD => $this->session->getPassword(),
        ];
    }

    /**
     * @param Response $response
     * @throws UnauthorizedException
     */
    public function handleResponse(Response $response)
    {
        $headers = $response->getHeaders();

        if (!array_key_exists(self::HEADER_TOKEN, $headers)) {
            throw new UnauthorizedException('No valid token counld be retrieved for this user / password combination');
        }

        $token = $headers[self::HEADER_TOKEN][0];
        $this->output = new Authorization($token);

    }
}