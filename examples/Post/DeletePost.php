<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Entity\Status;
use Fiyo\Mattermost\Request\Post\DeletePostRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$postId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$post = new Post();
$post->setId($postId);

$postRequest = new DeletePostRequest($post);

/** @var Status $status */
$status = $client->request($postRequest);