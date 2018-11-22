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
use yourickds\adminlte\models\Nomenclature;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yourickds\adminlte\models\Param;
use yourickds\adminlte\models\Value;

/**
 * NomenclatureController implements the CRUD actions for Nomenclature model.
 */
class NomenclatureController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update'],
                        'roles' => ['manager', 'cuNomenclature']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update-value'],
                        'roles' => ['manager', 'updateValueNomenclature']
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

    /**
     * Lists all Nomenclature models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Nomenclature::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nomenclature model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $modelParams = Param::find()->joinWith('value', false)
            ->where(['param.category_id' => $model->category_id])->select(['param.id', 'param.name', 'value.value'])
            ->indexBy('id')->asArray()->all();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $modelParams,
        ]);

        return $this->render('view', [
            'model' => $model,
            'params' => $dataProvider
        ]);
    }

    /**
     * Creates a new Nomenclature model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nomenclature();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nomenclature model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateValue($id, $nomenclature_id)
    {
        if (empty($id) || empty($nomenclature_id))
            return $this->redirect(['index']);

        $modelValue = Value::find()->where(['nomenclature_id' => $nomenclature_id])->andWhere(['param_id' => $id])
            ->one();

        if (!$modelValue)
            $modelValue = new Value();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_form-value', [
                'model' => $modelValue,
                'param_id' => $id,
                'nomenclature_id' => $nomenclature_id,
            ]);
        } else if (Yii::$app->request->isPost) {
            if ($modelValue->load(Yii::$app->request->post()) && $modelValue->validate()) {
                $modelValue->save();
            }
            return $this->redirect(['view', 'id' => $nomenclature_id]);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Nomenclature model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nomenclature model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nomenclature the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nomenclature::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
