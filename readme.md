![alt text](https://i.imgur.com/iuV8w3y.png)

____ 
[![Discord](https://img.shields.io/discord/354974912613449730.svg)](https://discord.gg/CCjHKn4)
[![Docker Pulls](https://img.shields.io/docker/pulls/linuxserver/heimdall.svg)](https://hub.docker.com/r/linuxserver/heimdall/)
[![firsttimersonly](http://img.shields.io/badge/first--timers--only-friendly-blue.svg?style=flat-square)](http://www.firsttimersonly.com/)

[![Paypal](https://heimdall.site/img/paypaldonate.svg)](https://paypal.me/pools/c/81ZR4dfBGo)

___

Visit the website - https://heimdall.site
___

## About 
As the name suggests Heimdall Application Dashboard is a dashboard for all your web applications. It doesn't need to be limited to applications though, you can add links to anything you like.

Heimdall is an elegant solution to organise all your web applications. It’s dedicated to this purpose so you won’t lose your links in a sea of bookmarks.

Why not use it as your browser start page?  It even has the ability to include a search bar using either Google, Bing or DuckDuckGo.

![alt text](https://i.imgur.com/MrC4QpN.gif)

## Video
If you want to see a quick video of it in use, go to https://youtu.be/GXnnMAxPzMc

## Supported applications
You can use the app to link to any site or application, but Foundation apps will auto fill in the icon for the app and supply a default color for the tile.  In addition Enhanced apps allow you provide details to an apps API, allowing you to view live stats directly on the dashboad.  For example, the NZBGet and Sabnzbd Enhanced apps will display the queue size and download speed while something is downloading.

**Enhanced**
- NZBGet
- Pihole
- Sabnzbd

**Foundation**
- Deluge
- DokuWiki
- Duplicati
- Emby
- Gitea
- Graylog
- Jdownloader
- Lidarr
- McMyAdmin
- Medusa
- NZBhydra & NZBhydra2
- Netdata
- Nextcloud
- Ombi
- OpenHAB
- Plex
- Plexpy
- Plexrequests
- Portainer
- Radarr
- SickRage
- Sonarr
- TT-RSS
- Traefik
- UniFI
- pfSense
- rTorrent/ruTorrent

## Installing
Apart from the Laravel dependencies, namely PHP >= 7.0.0, OpenSSL PHP Extension, PDO PHP Extension, Mbstring PHP Extension, Tokenizer PHP Extension and XML PHP Extension, the only other thing Heimdall needs is sqlite support.

Installation is as simple as cloning the repository somewhere, or downloading and extracting the zip/tar and pointing your httpd document root to it.  For simple testing you could just go to the folder and type `php artisan serve`

There are also dockers and instructions on how to use them at 

for x86-64: https://hub.docker.com/r/linuxserver/heimdall/

for armhf: https://hub.docker.com/r/lsioarmhf/heimdall/

and for arm64: https://hub.docker.com/r/lsioarmhf/heimdall-aarch64/

## Languages
The app has been translated into several languages, however the quality of the translations could do with work, if you would like to improve them or help with other translations they are stored in /resources/lang/

To create a new one, create a new folder with the ISO 3166-1 alpha-2 code as the name, copy app.php from /resources/lang/en/app.php into your new folder and replace the english strings.

When you are finished create a pull request.

Currently added languages are

- English
- German
- Finnish
- French
- Swedish
- Spanish
- Turkish

## Web Server Configuration

### Apache
A .htaccess file ships with the app, however, if it does not work with your Apache installation, try this alternative:

```
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

### Nginx
If you are using Nginx, the following directive in your site configuration will direct all requests to the index.php front controller:

```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
Someone was using the same nginx setup to both run this and reverse proxy Plex, Plex is served from /web so their location was interferring with the /webfonts.

Therefore, if your fonts aren't showing because you have a location for /web add the following
```
location /webfonts {
     try_files $uri $uri/;
}
```
If there are any other locations which might interefere with any of the folders in the /public folder, you might have to do the same for those as well, but it's a super fringe case.

### Reverse proxy
If you'd like to reverse proxy this app, we recommend using our letsencrypt/nginx docker image: [Letsencrypt/Nginx](https://hub.docker.com/r/linuxserver/letsencrypt/)  
You can either reverse proxy from the root location, or from a subdomain (subfolder method is currently not supported). For https proxy, make sure you use the https port of Heimdall webserver, otherwise some links may break. You can add security through `.htpasswd`

```
location / {
    auth_basic "Restricted";
    auth_basic_user_file /config/nginx/.htpasswd;
    include /config/nginx/proxy.conf;
    proxy_pass https://heimdall:443;
}
```

## Support
https://discord.gg/CCjHKn4 or through Github issues

## Donate
If you would like to show your appreciation, feel free to use the link below.

[![Paypal](https://heimdall.site/img/paypaldonate.svg)](https://paypal.me/pools/c/81ZR4dfBGo)

## Credits
- PHP Framework - [Laravel](https://laravel.com/)
- Icons - [FonteAwesome 5](https://fontawesome.com/)
- Javascript - [jQuery](https://jquery.com/)
- Colour picker - [Huebee](http://huebee.buzz/)
- Background image - [pexels](https://www.pexels.com)
- Everyone at Linuxserver.io that has helped with the app and let's not forget IronicBadger for the following question that started it all:
```
you know, i would love something like this landing page for all my servers apps
that gives me the ability to pin favourites
and / or search
@Stark @Kode do either of you think you'd be able to rustle something like this up ?
```

## License

This app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
