<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use yii\web\Controller;

class UiElementsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIcons()
    {
        return $this->render('icons');
    }

    public function actionButtons()
    {
        return $this->render('buttons');
    }

    public function actionSliders()
    {
        return $this->render('sliders');
    }

    public function actionTimeline()
    {
        return $this->render('timeline');
    }

    public function actionModals()
    {
        return $this->render('modals');
    }
}