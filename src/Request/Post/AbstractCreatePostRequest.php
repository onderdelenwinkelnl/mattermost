<?php

namespace Fiyo\Mattermost\Request\Post;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Factory\Entity\PostFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Factory\ValidatorFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use Fiyo\Mattermost\Validator\Post\CreatePostValidator;
use GuzzleHttp\Psr7\Response;

/**
 * Class AbstractCreatePostRequest
 * @package Fiyo\Mattermost\Request\Post
 */
abstract class AbstractCreatePostRequest extends AbstractAuthorisedPostRequest
{
    const FIELD_CHANNEL_ID = 'channel_id';
    const FIELD_MESSAGE    = 'message';
    const FIELD_ROOT_ID    = 'root_id';
    const FIELD_FILE_IDS   = 'file_ids';
    const FIELD_PROPS      = 'props';

    /**
     * @var string
     */
    protected $channelId;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $rootId;

    /**
     * @var array|string[]
     */
    protected $fileIds = [];

    /**
     * @var
     */
    protected $props;

    /**
     * @var Post
     */
    protected $post;

    /**
     * AbstractCreatePostRequest constructor.
     * @param Post $post
     * @throws \Fiyo\Mattermost\Exception\InvalidValidatorFactoryException
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->validate();
    }

    /**
     * @throws \Fiyo\Mattermost\Exception\InvalidValidatorFactoryException
     */
    protected function validate()
    {
        $validator = ValidatorFactory::create(CreatePostValidator::class, $this->post);
        $validator->validate();
    }

    /**
     * @param Response $response
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, PostFactory::class);
        $this->post = $this->output;
    }

    /**
     * @return array
     */
    protected function getPostContent()
    {
        $content = [
            self::FIELD_CHANNEL_ID => $this->post->getChannelId(),
            self::FIELD_MESSAGE => $this->post->getMessage(),
        ];

        if (!empty($this->post->getRootId())) {
            $content[self::FIELD_ROOT_ID] = $this->post->getRootId();
        }

        if (!empty($this->post->getFileIds())) {
            $content[self::FIELD_FILE_IDS] = $this->post->getFileIds();
        }

        if (!empty($this->post->getProps())) {
            $content[self::FIELD_PROPS] = $this->post->getProps();
        }

        return $content;
    }
}