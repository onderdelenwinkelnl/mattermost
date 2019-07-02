<?php

namespace Fiyo\Mattermost\Request\User;

use Fiyo\Mattermost\Request\AbstractAuthorisedPagedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetUsersRequest
 * @package Fiyo\Mattermost\Request\User
 */
class GetUsersRequest extends AbstractAuthorisedPagedGetRequest
{
    const ENDPOINT = '/users';

    const PARAMETER_IN_TEAM           = 'in_team';
    const PARAMETER_NOT_IN_TEAM       = 'not_in_team';
    const PARAMETER_IN_CHANNEL        = 'in_channel';
    const PARAMETER_NOT_IN_CHANNEL    = 'not_in_channel';
    const PARAMETER_GROUP_CONSTRAINED = 'group_constrained';
    const PARAMETER_WITHOUT_TEAM      = 'without_team';
    const PARAMETER_SORT              = 'sort';

    /**
     * @var string
     */
    protected $inTeam;

    /**
     * @var  string
     */
    protected $notInTeam;

    /**
     * @var string
     */
    protected $inChannel;

    /**
     * @var string
     */
    protected $notInChannel;

    /**
     * @var string
     */
    protected $groupConstrained;

    /**
     * @var string
     */
    protected $withoutTeam;

    /**
     * @var string
     */
    protected $sort;

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        $parameters = [];
        if ($this->inTeam) {
            $parameters[self::PARAMETER_IN_TEAM] = $this->inTeam;
        }

        if ($this->notInTeam) {
            $parameters[self::PARAMETER_NOT_IN_TEAM] = $this->notInTeam;
        }

        if ($this->inChannel) {
            $parameters[self::PARAMETER_IN_CHANNEL] = $this->inChannel;
        }

        if ($this->notInChannel) {
            $parameters[self::PARAMETER_NOT_IN_CHANNEL] = $this->notInChannel;
        }

        if ($this->groupConstrained) {
            $parameters[self::PARAMETER_GROUP_CONSTRAINED] = $this->groupConstrained;
        }

        if ($this->withoutTeam) {
            $parameters[self::PARAMETER_WITHOUT_TEAM] = $this->withoutTeam;
        }

        if ($this->sort) {
            $parameters[self::PARAMETER_SORT] = $this->sort;
        }

        return $parameters;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function handleResponse(Response $response)
    {
        echo $response->getBody();
    }

    /**
     * @param string $inTeam
     */
    public function setInTeam(string $inTeam)
    {
        $this->inTeam = $inTeam;
    }

    /**
     * @param string $notInTeam
     */
    public function setNotInTeam(string $notInTeam)
    {
        $this->notInTeam = $notInTeam;
    }

    /**
     * @param string $inChannel
     */
    public function setInChannel(string $inChannel)
    {
        $this->inChannel = $inChannel;
    }

    /**
     * @param string $notInChannel
     */
    public function setNotInChannel(string $notInChannel)
    {
        $this->notInChannel = $notInChannel;
    }

    /**
     * @param string $groupConstrained
     */
    public function setGroupConstrained(string $groupConstrained)
    {
        $this->groupConstrained = $groupConstrained;
    }

    /**
     * @param string $withoutTeam
     */
    public function setWithoutTeam(string $withoutTeam)
    {
        $this->withoutTeam = $withoutTeam;
    }

    /**
     * @param string $sort
     */
    public function setSort(string $sort)
    {
        $this->sort = $sort;
    }
}