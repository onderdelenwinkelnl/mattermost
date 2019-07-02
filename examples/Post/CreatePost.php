<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Post\CreatePostRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';
$channelId = '';
$message = '';
$pinned = true;
$rootId = ''; // String, Parent Post Id
$props = null; // \stdClass, json
$fileIds = []; // Array of strings of file Id's, maximum 5

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$post = new Post();
$post->setChannelId($channelId);
$post->setMessage($message);

/*
 * Optional
 *
 * $post->setPinned($pinned);
 * $post->setRootId($rootId);
 * $post->setProps($props);
 * foreach ($fileIds as $fileId) {
 *    $post->addFileId($fileId);
 * }
 */


$postRequest = new CreatePostRequest($post);

/** @var Post $post */
$post = $client->request($postRequest);