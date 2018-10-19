<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use yii\web\Controller;

class ChartsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMorris()
    {
        return $this->render('morris');
    }

    public function actionFlot()
    {
        return $this->render('flot');
    }

    public function actionInlineCharts()
    {
        return $this->render('inline-charts');
    }
}