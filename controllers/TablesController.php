<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use yii\web\Controller;

class TablesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData()
    {
        return $this->render('data');
    }
}