# Mattermost API
PHP wrapper for [Mattermost Api](https://api.mattermost.com/)

### Installation
```
composer require onderdelenwinkelnl/mattermost
```

### Authentication
Authentication can be handled via username / password
```php
$username = '';
$password = '';

$session = (new Session())
    ->fromLogin($username, $password);
```

Or it can be handled by using [personal access tokens](https://docs.mattermost.com/developer/personal-access-tokens.html)
```php
$accessToken = '';

$session = (new Session())
    ->fromPersonalAccessToken($accessToken);
```

Now setup the client with the session you've just created:
```php
$uri = ''; // Mattermost uri incl. port (f.e. https://mattermost.acme.com:443)
$client = new Client($session, $uri);
```

### Teams
##### List teams
```php
use Fiyo\Mattermost\Request\Team\GetTeamRequest;

$request = new GetTeamRequest();
$teams = $client->request($request);
```

### Channels
Get all channels in a team
```php
use Fiyo\Mattermost\Request\Channel\GetChannelsRequest;

$team = ''; // TeamId from GetTeamRequest();

$request = new GetChannelsRequest();
$channels = $client->rquest($request);
```

Get a channel by name
```php
use Fiyo\Mattermost\Request\Channel\GetChannelByNameRequest;

$teamId = ''; // Team id, can ge requested by GetTeamRequest
$name = ''; // Name of the channel, f.e. hub
$request = new GetChannelByNameRequest($teamId, $name);
$channel = $client->request($request);
```

### Posts
Create a new post
```php
use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Request\Post\CreatePostRequest;

$channelId = ''; // ChannelId can be requested from GetChannelByNameRequest() or GetChannelsRequest()
$message = ''; // The actual message you want to send

$post = new Post();
$post->setChannelId($channelId); 
$post->setMessage($message);
$post->setPinned($pinned); // Boolean, optional (Whether the post should be pinned or not)
$post->setRootId($rootId); // String, optional (The post ID to comment on)
$post->addFileId($fileId); // String, optional (File ID associated with the post, function can be called at a maximum of five)
$post->setProps($props); // stdClass (json),optional (A general JSON property bag to attach to the post)

$request = new CreatePostRequest($post);
$post = $client->request($request);
```