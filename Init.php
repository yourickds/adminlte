<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte;

use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Init extends Module
{
    public $controllerNamespace = 'yourickds\adminlte\controllers';

    public $layoutBody = ''; // Activate the fixed layout. You can't use fixed and boxed layouts together or Activate the boxed layout
    public $toggleSidebar = false; // Toggle the left sidebar's state (open or collapse)
    public $sidebarExpandHover = false; // Let the sidebar mini expand on hover
    public $toggleRightSidebarSlide = false; // Toggle between slide over content and push content effects
    public $toggleRightSidebarSkin = 'dark'; // Toggle between dark and light skins for the right sidebar
    public $skin = 'skin-blue'; // skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow, skin-blue-light, skin-black-light, skin-purple-light, skin-green-light, skin-red-light, skin-yellow-light
    public $dashboard = 'v1';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['adminlte/auth'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function() {
                    return Yii::$app->response->redirect(['adminlte/auth/login']);
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function init()
    {
        parent::init();
        Yii::$app->errorHandler->errorAction = 'adminlte/dashboard/error';
        if ($this->sidebarExpandHover){
            $this->toggleSidebar = true;
        }
    }
}