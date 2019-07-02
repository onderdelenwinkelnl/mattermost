<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Post\GetPostRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';
$postId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$postRequest = new GetPostRequest($postId);

/** @var Post $post */
$post = $client->request($postRequest);