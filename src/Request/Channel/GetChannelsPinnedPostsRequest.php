<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Factory\Entity\PostFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetChannelsPinnedPostsRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetChannelsPinnedPostsRequest extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/channels/%s/pinned';

    /**
     * @var string
     */
    protected $channelId;

    /**
     * GetChannelsPinnedPostsRequest constructor.
     * @param string $channelId
     */
    public function __construct(string $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @param Response $response
     */
    public function handleResponse(Response $response)
    {
        $json = \GuzzleHttp\json_decode($response->getBody());
        $posts = $json->posts;
        $order = $json->order;

        $output = [];
        foreach ($posts as $post) {
            $output[] = (new PostFactory())->build($post);
        }

        usort($output, function (Post $a, Post $b) use ($order) {

            $keyA = array_search($a->getId(), $order);
            $keyB = array_search($b->getId(), $order);

            var_dump($keyA);
            var_dump($keyB);

            if ($keyA === $keyB) {
                return 0;
            }

            return $keyA < $keyB ? -1 : 1;
        });

        $this->output = $output;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->channelId);
    }
}