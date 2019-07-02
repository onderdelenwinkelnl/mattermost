<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Post\CreateEphemeralPostRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = 'error_bot';
$password = 'N#-= Z&]6\'i~L C';
$uri = 'https://chat.fiyo.com:10443';

$userId = '';
$channelId = '';
$message = '';
$pinned = true;
$rootId = null; // String, Parent Post Id
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


$postRequest = new CreateEphemeralPostRequest($post);

/** @var Post $post */
$post = $client->request($postRequest);