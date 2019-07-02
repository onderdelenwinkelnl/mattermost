<?php


namespace Fiyo\Mattermost;

use Fiyo\Mattermost\Entity\Authorization;

/**
 * Class Session
 * @package Fiyo\Mattermost
 */
class Session
{
    /**
     * @var string
     */
    protected $loginId;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var Authorization
     */
    protected $authorization;

    /**
     * @param string $loginId
     * @param string $password
     * @return $this
     */
    public function fromLogin(string $loginId, string $password)
    {
        $this->loginId = $loginId;
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $accessToken
     * @return $this
     */
    public function fromPersonalAccessToken(string $accessToken)
    {
        $this->setAuthorization(new Authorization($accessToken));
        return $this;
    }

    /**
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return !is_null($this->authorization);
    }


    /**
     * @return Authorization
     */
    public function getAuthorization(): Authorization
    {
        return $this->authorization;
    }

    /**
     * @return string
     */
    public function getLoginId(): string
    {
        return $this->loginId;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param Authorization $authorization
     */
    public function setAuthorization(Authorization $authorization)
    {
        $this->authorization = $authorization;
    }

}