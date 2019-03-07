<?php
namespace backend\controllers;

use common\models\Course;
use common\models\Schedule;
use common\models\Student;
use common\models\StudentCourse;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Course controller
 */
class CourseController extends Controller
{
    public static $model = 'common\models\Course';

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
                        'actions' => ['list', 'item'],
                        'allow' => true
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'assign'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays courses list.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Creates new course.
     *
     * @return string
     */
    public function actionCreate()
    {
        $modelName = self::$model;
        $model = new $modelName;
        $schedule = new Schedule;

        $model->populateRelation('schedule', new Schedule);
        $this->_save($model, $schedule);

        return $this->render('create', compact('model'));
    }

    /**
     * Updates course.
     *
     * @return string
     */
    public function actionUpdate($id)
    {
        $modelName = self::$model;
        $model = Course::find()->where(['id' => $id])->with('schedule')->one();

        if (!$model) {
            throw new NotFoundHttpException("The course was not found.");
        }

        $this->_save($model, $model->schedule);

        return $this->render('update', compact('model'));
    }

    // Saving process
    private function _save($model, $schedule) {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($model->load($post) && $schedule->load($post)) {
                if ($model->validate() && $schedule->validate()) {
                    $schedule->save(false);

                    $model->schedule_id = $schedule->id;
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        }
    }

    /**
     * Deletes course.
     *
     * @return string
     */
    public function actionDelete($id)
    {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The course was not found.");
        }

        $model->delete();

        return $this->render('index', compact('model'));
    }

    /**
     * Assign course to student
     *
     * @param bool $studentId
     * @param bool $courseId
     */
    public function actionAssign($studentId = false, $courseId = false) {
        $model = new StudentCourse;
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->save(false);
                    return $this->redirect(['/']);
                }
            }
        }

        return $this->render('assign', compact('model'));
    }

    /**
     * Show courses
     */
    public function actionList() {
        return $this->render('list');
    }
    /**
     * Show courses item
     */
    public function actionItem($id) {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The course was not found.");
        }

        return $this->render('item', compact('model'));
    }
}
