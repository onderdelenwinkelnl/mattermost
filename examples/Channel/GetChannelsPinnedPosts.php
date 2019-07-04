<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\ChannelStatistics;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Channel\GetChannelsPinnedPostsRequest;
use Fiyo\Mattermost\Request\Channel\GetChannelStatisticsRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new GetChannelsPinnedPostsRequest($channelId);

/** @var Post[] $pinnedPosts */
$pinnedPosts = $client->request($channelRequest);