<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPutRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class UpdateChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class UpdateChannelRequest extends AbstractAuthorisedPutRequest
{
    const ENDPOINT = '/channels/%s';

    const FIELD_ID           = 'id';
    const FIELD_TEAM_ID      = 'team_id';
    const FIELD_NAME         = 'name';
    const FIELD_DISPLAY_NAME = 'display_name';
    const FIELD_PURPOSE      = 'purpose';
    const FIELD_HEADER       = 'header';
    const FIELD_TYPE         = 'type';

    /**
     * @var Channel
     */
    protected $channel;

    /**
     * UpdateChannelRequest constructor.
     * @param Channel $channel
     */
    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        $content = [
            self::FIELD_ID => $this->channel->getId(),
            self::FIELD_TEAM_ID => $this->channel->getTeamId(),
            self::FIELD_NAME => $this->channel->getName(),
            self::FIELD_DISPLAY_NAME => $this->channel->getDisplayName(),
            self::FIELD_TYPE => $this->channel->getType(),
        ];

        if (!empty($this->channel->getPurpose())) {
            $content[self::FIELD_PURPOSE] = $this->channel->getPurpose();
        }

        if (!empty($this->channel->getHeader())) {
            $content[self::FIELD_HEADER] = $this->channel->getHeader();
        }

        return $content;
    }

    /**
     * @param Response $response
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, ChannelFactory::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->channel->getId());
    }
}