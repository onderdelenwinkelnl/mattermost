<?php

namespace Fiyo\Mattermost;

use Fiyo\Mattermost\Request\Authenticate\SessionTokenRequest;
use Fiyo\Mattermost\Request\AuthenticatedInterface;
use Fiyo\Mattermost\Request\GetRequestInterface;
use Fiyo\Mattermost\Request\PostRequestInterface;
use Fiyo\Mattermost\Request\PutRequestInterface;
use Fiyo\Mattermost\Request\RequestInterface;

/**
 * Class Client
 * @package Fiyo\Mattermost
 */
class Client
{
    const API_URI = '/api/v4';

    const HEADER_USER_AGENT    = 'User-Agent';
    const HEADER_ACCEPT        = 'Accept';
    const HEADER_AUTHORIZATION = 'Authorization';

    const USER_AGENT           = 'Fiyo-Mattermost';
    const CONTENT_TYPE         = 'application/json';
    const AUTHORIZATION_BEARER = 'Bearer %s';


    /**
     * @var Session
     */
    protected $session;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var \http\Client
     */
    protected $httpClient;

    /**
     * Client constructor.
     * @param Session $session
     * @param string $uri
     */
    public function __construct(Session $session, string $uri)
    {
        $this->session = $session;
        $this->uri = $uri;
        $this->httpClient = new \GuzzleHttp\Client();
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(RequestInterface $request)
    {
        if ($request instanceof AuthenticatedInterface && !$this->session->isAuthorized()) {
            $this->authenticate();
        }

        return $this->handleRequest($request);
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function handleRequest(RequestInterface $request)
    {
        $uri = $this->uri . self::API_URI . $request->getEndpoint();

        if ($request instanceof GetRequestInterface) {
            $uri .= '?' . http_build_query($request->getParameters());
        }

        echo $uri;

        $result = $this->httpClient->request($request->getMethod(), $uri, $this->getOptionsFromRequest($request));

        $request->handleResponse($result);

        return $request->getOutput();
    }

    /**
     * @param RequestInterface $request
     * @return array
     */
    protected function getOptionsFromRequest(RequestInterface $request): array
    {
        $options = [
            'headers' => [
                self::HEADER_USER_AGENT => self::USER_AGENT,
                self::HEADER_ACCEPT => self::CONTENT_TYPE,
            ]
        ];

        if ($request instanceof PostRequestInterface || $request instanceof PutRequestInterface) {
            $options['json'] = $request->getContent();
        }

        if ($request instanceof AuthenticatedInterface) {
            $options['headers'][self::HEADER_AUTHORIZATION] = sprintf(self::AUTHORIZATION_BEARER, $this->session->getAuthorization()->getToken());
        }

        return $options;
    }

    protected function authenticate()
    {
        $sessionTokenRequest = new SessionTokenRequest($this->session);
        $authorization = $this->handleRequest($sessionTokenRequest);

        $this->session->setAuthorization($authorization);
    }
}