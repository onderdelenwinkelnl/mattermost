<?php


namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractPutRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class PatchChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class PatchChannelRequest extends AbstractPutRequest
{
    const ENDPOINT = '/channels/%s/patch';

    const FIELD_NAME         = 'name';
    const FIELD_DISPLAY_NAME = 'display_name';
    const FIELD_PURPOSE      = 'purpose';
    const FIELD_HEADER       = 'header';

    /**
     * @var Channel
     */
    protected $channel;

    /**
     * PatchChannelRequest constructor.
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
        $content = [];

        if (!empty($this->channel->getName())) {
            $content[self::FIELD_NAME] = $this->channel->getName();
        }

        if (!empty($this->channel->getDisplayName())) {
            $content[self::FIELD_DISPLAY_NAME] = $this->channel->getDisplayName();
        }

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