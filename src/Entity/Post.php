<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Post
 * @package Fiyo\Mattermost\Entity
 */
class Post extends AbstractTimedEntity
{
    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $channelId;

    /**
     * @var bool
     */
    protected $pinned;

    /**
     * @var string
     */
    protected $rootId;

    /**
     * @var null|string
     */
    protected $originalId;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var null|string
     */
    protected $type;

    /**
     * @var \stdClass
     */
    protected $props;

    /**
     * @var null|string
     */
    protected $hashtags;

    /**
     * @var null|string
     */
    protected $pendingPostId;

    /**
     * @var \stdClass
     */
    protected $metaData;

    /**
     * @var array
     */
    protected $fileIds = [];

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     */
    public function setChannelId(string $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return string
     */
    public function getRootId()
    {
        return $this->rootId;
    }

    /**
     * @param string $rootId
     */
    public function setRootId(string $rootId)
    {
        $this->rootId = $rootId;
    }

    /**
     * @return string|null
     */
    public function getOriginalId()
    {
        return $this->originalId;
    }

    /**
     * @param string|null $originalId
     */
    public function setOriginalId(string $originalId)
    {
        $this->originalId = $originalId;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return \stdClass
     */
    public function getProps()
    {
        return $this->props;
    }

    /**
     * @param \stdClass $props
     */
    public function setProps(\stdClass $props)
    {
        $this->props = $props;
    }

    /**
     * @return string|null
     */
    public function getHashtags()
    {
        return $this->hashtags;
    }

    /**
     * @param string|null $hashtags
     */
    public function setHashtags(string $hashtags)
    {
        $this->hashtags = $hashtags;
    }

    /**
     * @return string|null
     */
    public function getPendingPostId()
    {
        return $this->pendingPostId;
    }

    /**
     * @param string|null $pendingPostId
     */
    public function setPendingPostId(string $pendingPostId)
    {
        $this->pendingPostId = $pendingPostId;
    }

    /**
     * @return \stdClass
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * @param \stdClass $metaData
     */
    public function setMetaData(\stdClass $metaData)
    {
        $this->metaData = $metaData;
    }

    /**
     * @return bool
     */
    public function isPinned()
    {
        return $this->pinned;
    }

    /**
     * @param bool $pinned
     */
    public function setPinned(bool $pinned)
    {
        $this->pinned = $pinned;
    }

    /**
     * @return array
     */
    public function getFileIds(): array
    {
        return $this->fileIds;
    }

    /**
     * @param string $fileId
     */
    public function addFileId(string $fileId)
    {
        $this->fileIds[] = $fileId;
    }
}
