AdminLTE module for Yii2
==========================
Yii2 module [AdminLTE](https://adminlte.io/).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

* Either run

```
php composer.phar require --prefer-dist "yourickds/adminlte" "*"
```

or add

```json
"yourickds/adminlte" : "*"
```

to the `require` section of your application's `composer.json` file.

* Add a new module in `modules` section of your application's configuration file, for example:

```php
'modules' => [
    'adminlte' => [
        'class' => 'yourickds\adminlte\Init',
        'layout' => 'main', // main or top
        'layoutBody' => 'fixed', // fixed, layout-boxed or empty
        'toggleSidebar' => false,
        'sidebarExpandHover' => false,
        'toggleRightSidebarSlide' => true,
        // Toggle between dark and light skins for the right sidebar
        'toggleRightSidebarSkin' => 'dark', 
        // skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow,
        // skin-blue-light, skin-black-light, skin-purple-light, skin-green-light,
        // skin-red-light, skin-yellow-light
        'skin' => 'skin-green',
        'dashboard' => 'v2' // v1 or v2
    ]
],
```

* Add a authManager in `components` section of your application's configuration file, for example:

```php
'authManager' => [
    'class' => 'yii\rbac\DbManager',
    'cache' => 'cache'
],
```

* Add a new rule for `urlManager` of your application's configuration file, for example:

```php
'urlManager' => [
    'rules' => [
        'admin/<controller>/<action>' => 'adminlte/<controller>/<action>',
        'admin' => 'adminlte/dashboard',
    ],
],
```

* Add a template for Gii CRUD generator of your application's configuration file, for example:

```php  
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'generators' => [
        'crud' => [
            'class' => 'yii\gii\generators\crud\Generator',
            'templates' => [
                'adminlte' => '@vendor/yourickds/adminlte/gii/crud',
            ]
        ]
    ],
    // uncomment the following to add your IP if you are not connecting from localhost.
    // 'allowedIPs' => ['127.0.0.1', '::1'],
];
```

* Update the database schema using the migration

```php
php yii migrate/up --migrationPath=@yii/rbac/migrations
```

and

```php
php yii migrate/up --migrationPath=@vendor/yourickds/adminlte/migrations
```

Resources
---------
* [AdminLTE](https://adminlte.io/)
