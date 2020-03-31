Portfolio Toolkit adds 'portfolio' post type with two taxonomies (Category and Tag). It also adds custom metabox with three fields: 'Client', 'Date' and 'URL'.

## Installation

**Using The WordPress Dashboard (Recommended)**

1. Go to `Plugins` → `Add New`
2. In a search field type **portfolio-toolkit** and hit enter
3. Click `Install Now` next to **Portfolio Toolkit** by Dmitry Mayorov
4. Click `Activate the plugin` when installation is complete

**Uploading in WordPress Dashboard**

1. Go to `Plugins` → `Add New`
2. Click on the `Upload Plugin` button next to the **Add Plugins** page title
3. Click on the `Choose File` button
4. Locate **portfolio-toolkit.zip** on your computer
5. Click the `Install Now` button
6. Click `Activate the plugin` when installation is complete

**Using FTP (Not Recommended)**

1. Download **portfolio-toolkit.zip**
2. Extract the **portfolio-toolkit** directory to your computer
3. Upload the **portfolio-toolkit** directory  **/wp-content/plugins/**
4. Go to `Plugins` → `Installed Plugins`
5. Click `Activate` under **Portfolio Toolkit** plugin title

## FAQ

**Who is this plugin for?**
Target audience of this plugin is mainly theme developers who are willing to create a portfolio theme or want to add portfolio functionality to an existing one.

**How is this plugin different from Jetpack portfolio module or similar plugins?**
This plugin is actually inspired by Jetpack portfolio module and [Portfolio Post Type](https://github.com/devinsays/portfolio-post-type) by Devin Price and Gary Jones. However, Portfolio Toolkit is built with [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate), which follows a slightly different approach in building plugins. On top of that, Portfolio Toolkit adds custom metabox with three fields.

**What fields are included in a metabox?**
There are three meta boxes at the moment:
Client - Client name for the project (e.g. Apple)
Date - Release date of the project (e.g. June 2015)
URL - Link to a live project (e.g. http://www.apple.com/)

**Does this plugin include any templates?**
No, it doesn't. However, you can easily create your own in your theme (or child theme).

**Can I participate?**
Absolutely. You are welcome to report issues and submit pull requests.

## Changelog

**0.1.8**

* Fixed: Make portfolio taxonomies appear in the editor.

**0.1.7**

* Added: Set 'show_in_rest' key to true so Gutenberg is enabled by default

**0.1.6**

* Fixed: Minor Codesniffer warnings
* Added: Compatibility with WordPress 5.0

**0.1.5**

* Fixed: Minor Codesniffer warnings
* Changed: Portfolio taxonomy labels

**0.1.4**

* Fixed: Minor Codesniffer warnings
* Added: Compatibility with WordPress 4.5

**0.1.3**

* Fixed: Minor improvements and bug fixes

**0.1.2**

* Added: Compatibility with WordPress 4.3

**0.1.1**

* Fixed: Minor codesniffer warnings

**0.1.0**

* Initial Release
