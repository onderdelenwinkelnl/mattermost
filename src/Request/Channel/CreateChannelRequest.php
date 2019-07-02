<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Factory\ValidatorFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use Fiyo\Mattermost\Validator\Channel\CreateChannelValidator;
use GuzzleHttp\Psr7\Response;

/**
 * Class CreateChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class CreateChannelRequest extends AbstractAuthorisedPostRequest
{
    const ENDPOINT = '/channels';

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
     * CreateChannelRequest constructor.
     * @param Channel $channel
     * @throws \Fiyo\Mattermost\Exception\InvalidValidatorFactoryException
     */
    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
        ValidatorFactory::create(CreateChannelValidator::class, $this->channel)->validate();
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        $content = [
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
        $this->channel = $this->output;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}