<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use yii\web\Controller;

class ExamplesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPrint()
    {
        return $this->renderPartial('print');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionLockscreen()
    {
        return $this->renderPartial('lockscreen');
    }

    public function actionBlank()
    {
        return $this->render('blank');
    }

    public function actionPace()
    {
        return $this->render('pace');
    }
}