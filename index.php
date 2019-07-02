<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Channel\GetChannelByNameRequest;
use Fiyo\Mattermost\Request\Channel\GetChannelsRequest;
use Fiyo\Mattermost\Request\Post\CreateEphemeralPostRequest;
use Fiyo\Mattermost\Request\Post\CreatePostRequest;
use Fiyo\Mattermost\Request\Post\DeletePostRequest;
use Fiyo\Mattermost\Request\Post\GetPostRequest;
use Fiyo\Mattermost\Request\Team\GetTeamRequest;
use Fiyo\Mattermost\Request\User\GetUsersRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . '/vendor/autoload.php';

$username = 'api';
$password = '0k8bMlJbhoVv2PGGUsf21gjjoFKVpa9q';
$uri = 'https://chat.fiyo.com:10443';

$session = (new Session())
    ->fromPersonalAccessToken($username, $password);

$client = new Client($session, $uri);

//$postRequest = new GetPostRequest('pyqkfu3fcpf7zjy49dr6tasygy');
//$post = $client->request($postRequest);
//
//print_r($post);
//exit;
//
//$usersRequest = new GetUsersRequest();
//$usersRequest->setInChannel('zric9ig9sjfyik1pieh6rys7gh');
//$users = $client->request($usersRequest);
//print_r($users);https://chat.fiyo.com:10443/fiyo/pl/aksz1jkhojfepf15d8g51no8mr
//exit;
//
//

$teamId = ''; // Team id, can ge requested by GetTeamRequest
$name = ''; // Name of the channel, f.e. hub
$request = new GetChannelByNameRequest($teamId, $name);



$request = new GetTeamRequest();
$teams = $client->request($request);

$post = new Post();
$post->setId('aksz1jkhojfepf15d8g51no8mr');
$releteRequest = new DeletePostRequest($post);
$status = $client->request($releteRequest);

var_dump($status);
exit;

$post = new Post();
$post->setChannelId('zric9ig9sjfyik1pieh6rys7gh');
$post->setMessage('Hola');
$post->setPinned(true);
$post->setRootId($rootId); // String, optional (The post ID to comment on)
$post->addFileId($fileId); // String, optional (File ID associated with the post, function can be called at a maximum of five)
$post->setProps($props); // stdClass (json),optional (A general JSON property bag to attach to the post)




$channelId = 'zric9ig9sjfyik1pieh6rys7gh';
$createPostRequest = new CreateEphemeralPostRequest('jka1hnem5b8gdydfxk78bz8qew',$post);
$post = $client->request($createPostRequest);

var_dump($post);


/****
 *
 *
 * ^"([a-z_]+)".+
 * const FIELD_\U$1 = '\L$1';
 *
 * const FIELD_([A-Z_]+).+
 * \$channel->set$1(\$content->{self::FIELD_$1});
 *
 * set([a-z])([a-z]+)
 * set$1\L$2
 *
 *
 *
 *
 *
 */