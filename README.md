Kanboard Plugin for notes
==========================

This plugin adds a new table with advanced features for viewing tasks across projects on one page.

Plugin for https://github.com/fguillot/kanboard

Author
------

- 2016 ThomasTJ (TTJ)
- License MIT

Installation
------------

- Decompress the archive in the `plugins` folder

or

- Create a folder **plugins/AllBoardView**
- Copy all files under this directory

or

- Clone folder with git

Requirements
---

* Change the template **show.php** to according your columns (check the if statement and the JS rendering part)
* Change the reference to Webix CDN in **show.php** to your locale copy. Go download Webix JS. READ THE LICENSE! http://webix.com/download2/

Todo
----

- Nothing, waiting for Stinnux pull request [2676](https://github.com/kanboard/kanboard/pull/2676)

HALLO!
------

- This plugin is ONLY for viewing the task. There's no function in moving the task from one column to another.

Tested
------

- Application version: 1.0.34
- PHP version: 5.6.27
- PHP SAPI: apache2handler
- OS version: Linux 4.8.6-1-ARCH
- Database driver: sqlite
- Database version: 3.15.1
