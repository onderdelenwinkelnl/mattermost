<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Post\GetPostRequest;
use Fiyo\Mattermost\Request\Post\UpdatePostRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$postId = '';
$newMessage = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$getPostRequest = new GetPostRequest($postId);

/** @var Post $post */
$post = $client->request($getPostRequest);
$post->setMessage($newMessage);

$postRequest = new UpdatePostRequest($post);
$client->request($postRequest);
