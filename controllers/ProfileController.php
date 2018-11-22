<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use Yii;
use yii\web\Controller;
use yourickds\adminlte\models\Repass;
use yourickds\adminlte\models\User;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $model_repass = new Repass();
        $tab = 'activity';

        if (Yii::$app->request->get('action') == 'repass')
            if ($model_repass->load(Yii::$app->request->post())) {
                if ($model_repass->validate()) {
                    $modelUser = Yii::$app->user->identity;
                    $modelUser->changePassword($model_repass->new_pass);
                    if ($modelUser->save()){
                        Yii::$app->session->setFlash('notification', ['status' => 'success', 'value' => 'Ваш пароль был успешно изменен!']);
                    } else {
                        Yii::$app->session->setFlash('notification', ['status' => 'danger', 'value' => 'Ваш пароль не был изменен!']);
                    }
                } else {
                    $tab = 'repass';
                }
            }

        return $this->render('index', [
            'repass' => $model_repass,
            'tab' => $tab
        ]);
    }
}