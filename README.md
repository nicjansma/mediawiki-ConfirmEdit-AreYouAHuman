# AreYouAHuman ConfirmEdit extension

This is a [Are You A Human](http://areyouahuman.com) [ConfirmEdit](http://www.mediawiki.org/wiki/Extension:ConfirmEdit) extension for [MediaWiki](http://www.mediawiki.org/).

See the [ConfirmEdit extension page](http://www.mediawiki.org/wiki/Extension:ConfirmEdit) for details on how to setup ConfirmEdit first.

# Installation

1. Install [ConfirmEdit](http://www.mediawiki.org/wiki/Extension:ConfirmEdit)

2. Copy AreYouAHumanCaptcha's files and directory (`AreYouAHuman*.php` and the `AreYouAHuman/` directory) to the ConfirmEdit directory

3. Add the following lines to the end of your LocalSettings.php:

````php
require_once( "$IP/extensions/ConfirmEdit/AreYouAHumanCaptcha.php" );
$wgCaptchaClass = 'AreYouAHumanCaptcha';
````

4. Edit the `AreYouAHuman/ayah_config.php` file and add your `AYAH_PUBLISHER_KEY` and `AYAH_SCORING_KEY`.

# Version History

* 2013-05-07: Version 1.0: Initial release
* 2013-05-28: Version 1.1: Adds no JavaScript support, removed deprecated functions

# Contributors

* [Nic Jansma](http://nicj.net)
* [Strix](https://github.com/strixaluco)