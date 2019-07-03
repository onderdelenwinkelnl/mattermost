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

### Examples
You can find examples for every single API request in [examples](./examples)

##### Teams
* [Get all teams](./examples/Team/GetTeams.php)


##### Users
* [Get all users](./examples/User/GetUsers.php)
* [Get users by username](./examples/User/GetUsersByUsername.php)


##### Channels
* [Create channel](./examples/Channel/CreateChannel.php)
* [Create direct message channel](./examples/Channel/CreateDirectMessageChannel.php)
* [Create group message channel](./examples/Channel/CreateGroupMessageChannel.php)
* [Get all public channels](./examples/Channel/GetPublicChannels.php)
* [Get channel by name](./examples/Channel/GetChannelByName.php)


##### Posts
* [Create post](./examples/Post/CreatePost.php)
* [Create ephemeral post](./examples/Post/CreateEphermeralPost.php)
* [Update post](./examples/Post/UpdatePost.php)
* [Delete post](./examples/Post/DeletePost.php)
* [Get post by id](./examples/Post/GetPost.php)