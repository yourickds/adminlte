<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yourickds\adminlte\models\Role;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RoleController extends Controller
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
                        'allow' => true,
                        'roles' => ['root'],
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
        $roles = Yii::$app->authManager->getRoles();
        unset($roles['root']);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $roles,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($role)
    {
        $role = Yii::$app->authManager->getRole($role);
        $permissions = Yii::$app->authManager->getPermissionsByRole($role->name);

        $permissions_array = [];
        foreach ($permissions as $permission){
            $permissions_array[] = $permission->description;
        }

        $permissions_string = implode(', ', $permissions_array);

        return $this->render('view', [
            'model' => $role,
            'permissions' => $permissions_string
        ]);
    }

    public function actionCreate()
    {
        $model = new Role(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $role = Yii::$app->authManager->createRole($model->name);
            $role->description = $model->description;
            Yii::$app->authManager->add($role);

            if ($model->permissions && !empty($model->permissions)){
                foreach ($model->permissions as $permission){
                    $permit = Yii::$app->authManager->getPermission($permission);
                    if ($permit)
                        Yii::$app->authManager->addChild($role, $permit);
                }
            }
            return $this->redirect(['view', 'role' => $role->name]);
        }

        $permissions = Yii::$app->authManager->getPermissions();
        $permissions_array = [];
        foreach ($permissions as $permission){
            $permissions_array[$permission->name] = $permission->description;
        }

        return $this->render('create', [
            'model' => $model,
            'permissions' => $permissions_array
        ]);
    }

    public function actionUpdate($role)
    {
        $model = new Role();
        $role = Yii::$app->authManager->getRole($role);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->authManager->removeChildren($role);

            if ($model->permissions && !empty($model->permissions)){
                foreach ($model->permissions as $permission){
                    $permit = Yii::$app->authManager->getPermission($permission);
                    Yii::$app->authManager->addChild($role, $permit);
                }
            }
            return $this->redirect(['view', 'role' => $role->name]);
        }

        $model->name = $role->name;
        $model->description = $role->description;

        $permissions_role = Yii::$app->authManager->getPermissionsByRole($role->name);
        $permissions_selected = [];
        foreach ($permissions_role as $permission){
            $model->permissions[] = $permission->name;
        }

        $permissions = Yii::$app->authManager->getPermissions();
        $permissions_array = [];
        foreach ($permissions as $permission){
            $permissions_array[$permission->name] = $permission->description;
        }

        return $this->render('update', [
            'model' => $model,
            'permissions' => $permissions_array
        ]);
    }

    public function actionDelete($role)
    {
        $role = Yii::$app->authManager->getRole($role);
        if ($role->name != 'root')
            Yii::$app->authManager->remove($role);

        return $this->redirect(['index']);
    }
}
