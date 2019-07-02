<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class User
 * @package Fiyo\Mattermost\Entity
 */
class User extends AbstractTimedEntity
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $authDate;

    /**
     * @var string
     */
    protected $authService;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $nickname;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var string
     */
    protected $roles;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var Timezone
     */
    protected $timezone;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getAuthDate(): string
    {
        return $this->authDate;
    }

    /**
     * @param string $authDate
     */
    public function setAuthDate(string $authDate)
    {
        $this->authDate = $authDate;
    }

    /**
     * @return string
     */
    public function getAuthService(): string
    {
        return $this->authService;
    }

    /**
     * @param string $authService
     */
    public function setAuthService(string $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    public function setRoles(string $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return Timezone
     */
    public function getTimezone(): Timezone
    {
        return $this->timezone;
    }

    /**
     * @param Timezone $timezone
     */
    public function setTimezone(Timezone $timezone)
    {
        $this->timezone = $timezone;
    }
}