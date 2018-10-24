<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use Yii;
use yii\filters\AccessControl;
use yourickds\adminlte\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['delete'],
                        'roles' => ['admin']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['root', 'admin'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['!=', 'id', 1]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if ($id == 1)
            throw new NotFoundHttpException('The requested page does not exist.');
        $model = $this->findModel($id);

        $roles = Yii::$app->authManager->getRolesByUser($model->id);
        foreach ($roles as $role){
            $model->role = $role->description;
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $password = Yii::$app->security->generateRandomString();
            $model->password = Yii::$app->security->generatePasswordHash($password);

            if ($model->save()){
                $role = Yii::$app->authManager->getRole($model->role);
                Yii::$app->authManager->assign($role, $model->id);

                Yii::$app->mailer->compose('@vendor/yourickds/adminlte/mail/email', ['login' => $model->email, 'password' => $password])
                    ->setFrom('from@domain.com')
                    ->setTo('to@domain.com')
                    ->setSubject('Message subject')
                    ->send();

                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $roles = Yii::$app->authManager->getRolesByUser($model->id);
        foreach ($roles as $role){
            $model->role = $role->name;
        }

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->authManager->revokeAll($model->id);

            $role = Yii::$app->authManager->getRole($model->role);
            Yii::$app->authManager->assign($role, $model->id);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if ($id != Yii::$app->user->getId()) {
            $model = $this->findModel($id);
            Yii::$app->authManager->revokeAll($model->id);
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
