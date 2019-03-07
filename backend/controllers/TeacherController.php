<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Teacher controller
 */
class TeacherController extends Controller
{
    public static $model = 'common\models\Teacher';

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
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays students list.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Creates new teacher.
     *
     * @return string
     */
    public function actionCreate()
    {
        $modelName = self::$model;
        $model = new $modelName;

        $this->_save($model);

        return $this->render('create', compact('model'));
    }

    /**
     * Updates teacher.
     *
     * @return string
     */
    public function actionUpdate($id)
    {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The teacher was not found.");
        }

        $this->_save($model);

        return $this->render('update', compact('model'));
    }

    // Saving process
    private function _save($model) {
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        }
    }

    /**
     * Deletes teacher.
     *
     * @return string
     */
    public function actionDelete($id)
    {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The teacher was not found.");
        }

        $model->delete();

        return $this->render('index', compact('model'));
    }
}
