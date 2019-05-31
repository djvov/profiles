# #Profiles

<http://test3.djvov.ru>

# Overview

This project implements the management of user profiles, with multiple emails and phones,
phone types, and the manager can set primary  email or phone. The Project based on the MVC architectural pattern.
Server requirements is PHP 5.6+.
Frontend uses Smarty, adaptive desing based on Bootstrap v4.
Backend uses Singletone class to avoid multiple instances, and abstract DB class for secure database queries.
In the `\Index.php` there is autoload functions and folders settings.
In the `\Engine\App.php` there is base class, and run the Router.
In the `\Engine\Config.php` there is config class, databse access and system folders.
In the `\Engine\Core\Router.php` there is class which parses URL and generate model, controller and view filenames based on URL, also 404 page with description.

For example, URL is `example.com/part1/part2`
Controller name generate from `part1` of URL, and action is `part2`.
`/Engine/MVC/Part1/ControllerPart1.php`

And in the code
```php
use djvov\Core\Controller;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ControllerPart1 extends Controller
{
    use Singleton;
    public static function actionPart2()
    {
    }
```

GET and POST variables moves to `Router::$query` array for secure reasons
```php
Router::$query['email_id']
```

In the `\Engine\Core\DB.php` there is abstract DB class for secure database queries.
In the `\Engine\Core\View.php` there is Smarty functions to generate page or ajax response.
In the `\Engine\Core\Phones.php` there is class to manage phone types.
In the `\Engine\Core\Profiles.php` there is class to manage whole profile, add/delete/edit emails and phones.
In the `\Engine\Views` folder there is smarty templates for frontend.
In the `\Engine\MVC\Index` folder there is model, view, and controller for main page.
In the `\Engine\MVC\Phones` folder there is model, view, and controller for phone types page.
In the `\Engine\MVC\Profiles` folder there is model, view, and controller for profiles page.

# File structure

root
+- css
|   - style.css
+- Engine
|   +- Core
|   |   - Controller.php
|   |   - DB.php
|   |   - Model.php
|   |   - Phones.php
|   |   - Profiles.php
|   |   - Router.php
|   |   - Singleton.php
|   |   - View.php
|   +- MVC
|   |   +- Index
|   |   |   - ControllerIndex.php
|   |   |   - ModelIndex.php
|   |   |   - ViewIndex.php
|   |   +- Phones
|   |   |   - ControllerPhones.php
|   |   |   - ModelPhones.php
|   |   |   - ViewPhones.php
|   |   +- Profiles
|   |   |   - ControllerProfiles.php
|   |   |   - ModelProfiles.php
|   |   |   - ViewProfiles.php
|   +- Smarty
|   +- Views
|   |   +- 404
|   |   |   - 404.tpl
|   |   +- Index
|   |   |   +- Index
|   |   |   |   - Index.js
|   |   |   |   - Index.tpl
|   |   +- Phones
|   |   |   +- TypeEdit
|   |   |   |   - TypeEdit.tpl
|   |   |   +- TypeList
|   |   |   |   - TypeList.js
|   |   |   |   - TypeList.tpl
|   |   +- Profiles
|   |   |   +- Edit
|   |   |   |   - Edit.js
|   |   |   |   - Edit.tpl
|   - .htaccess
|   - App.php
|   - Config.php
- .htacess
- Index.php

