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
* [Search group channels](./examples/Channel/SerachGroupChannel.php) _requires minimum Mattermost server version 5.14_
* [Get channel timezones](./examples/Channel/GetChannelTimezones.php) _requires minimum Mattermost server version 5.6_
* [Get channel by id](./examples/Channel/GetChannelById.php)
* [Update channel](./examples/Channel/UpdateChannel.php)
* [Delete channel](./examples/Channel/DeleteChannel.php)
* [Patch channel](./examples/Channel/PatchChannel.php)
* [Convert a public channel to private](./examples/Channel/ConvertPublicToPrivateChannel.php)
* [Restore a channel](./examples/Channel/RestoreChannel.php)
* [Get channel statistics](./examples/Channel/GetChannelStatistics.php)
* [Get pinned posts from a channel](./examples/Channel/GetChannelsPinnedPosts.php)
* [Get deleted channels](./examples/Channel/GetDeletedChannels.php)
* [Find public channels by searchterm](./examples/Channel/AutocompleteChannels.php) _requires minimum Mattermost server version 4.7_


##### Posts
* [Create post](./examples/Post/CreatePost.php)
* [Create ephemeral post](./examples/Post/CreateEphermeralPost.php)
* [Update post](./examples/Post/UpdatePost.php)
* [Delete post](./examples/Post/DeletePost.php)
* [Get post by id](./examples/Post/GetPost.php)