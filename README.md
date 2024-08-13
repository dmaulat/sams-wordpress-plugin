# SAMS Plugin for WordPress

## Features

* Shortcode for SAMS table integration
* Shortcode for SAMS fixtures integration

## Context

The national German volleyball confederation DVV (Deutscher Volleyballverband) provides an XML API for their league management tool `SAMS`.

After years of maintaining sports-related websites, gathering the experience that there is nothing more boring than updating results, fixtures and standings, I forced myself to head straight into WordPress plugin development and PHP.

## Install

The plugin itself is at a very early stage and I am still new to PHP and WordPress development. Intentionally there are no releases or version numbers provided yet.

Caused by that the installation needs some manual work at the beginning (it is not that hard - trust me).

1. Prepare a folder called `sams-plugin` and copy all files and folders inside the `app` and `wordpress` folders into it.
1. Upload the`sams-plugin` folder to your WordPress plugins directory (`wp-content/plugins`)
1. Log into your sites Admin CP and activate it from the plugins index page

## Usage

### Integrate a SAMS table into your WordPress content

After activating the plugin succesfully, you can place a table to a certain point of your website using the `samstable` shortcode with your `apikey`, a `verband` and a `matchseriesid`, like this:

``` php
[samstable verband="bundesliga" apikey="your_api_key" matchseriesid="2012217"]
```

### Integrate a SAMS fixture into your WordPress content

You can place fixtures for a certain division and team using the `samsfixtures` shortcode with your `apikey`, a `verband`, a `matchseriesid` and a `teamid`:

``` php
[samsfixtures verband="regionalliga-sued" apikey="your_api_key" matchseriesid="match_series_id" teamid="your_team_id"]
```

### Obtaining DVV division, match series, season etc. information

The SAMS XML-interface is described in the following wiki:

[XML Schnittstelle](http://wiki.sams-server.de/wiki/XML-Schnittstelle#Spielplan_und_Ergebnisse)

Here all possible values for your `verband`:
* flvb 
* international 
* bundesliga 
* dritte-liga 
* regionalliga-nord 
* regionalliga-nordost 
* regionalliga-nordwest 
* regionalliga-ost 
* regionalliga-sued 
* regionalliga-suedwest 
* regionalliga-west 
* baden 
* berlin 
* bremen 
* hessen 
* hvv 
* niedersachsen 
* nordrhein-westfalen 
* nrw 
* nwvv 
* rheinland-pfalz 
* saarland 
* sachsen 
* sachsen-anhalt 
* shvv 
* ssvb 
* svv 
* thueringen 
* tvv 
* vlw 
* vvb 
* vvrp 
* vvsa 
* wuerttemberg 
* wvv 

## License

This piece of modern art is published with a GNU GPLv3 license. I will not take charge of any harm, damages or data losses that could be caused by this plugin. Use it on your own risk.

## Contact and contributions

Feel free to create a pull request or get in contact with me.
