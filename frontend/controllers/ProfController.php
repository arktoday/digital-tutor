<?php

namespace frontend\controllers;

use common\models\Holland;
use common\models\Profession;
use Yii;
use common\models\ProfResult;
use common\models\ProfResultSearch;
use common\models\Subject;
use common\models\EduProg;
use common\models\EdprogSubj;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfController implements the CRUD actions for ProfResult model.
 */
class ProfController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProfResult models.
     * @return mixed
     */
    public function actionIndex()
    {
        $items = Holland::find()->all();

        $searchModel = new ProfResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('items'));
    }

    public function actionDbWriteResult()
    {
        $resultsModel = new ProfResult();
        $userId = Yii::$app->user->identity->getId();

        if ($profResult = ProfResult::findOne(['user_id' => $userId])) {
            $profResult->delete();
        }

        $resultsModel->user_id = $userId;
        $resultsModel->real_type = $_POST['real_count'];
        $resultsModel->int_type = $_POST['int_count'];
        $resultsModel->soc_type = $_POST['soc_count'];
        $resultsModel->conv_type = $_POST['conv_count'];
        $resultsModel->ent_type = $_POST['ent_count'];
        $resultsModel->art_type = $_POST['art_count'];
        $resultsModel->save();

        $this->redirect('profresult');
    }

    public function actionProfresult()
    {
        $results = ProfResult::findOne(['user_id' => Yii::$app->user->identity->getId()]);
        $professions = [];

        $edu_progs = [];

        if ($results->real_type >= 5) {
            $professions['real'] = Profession::find()
                ->select('name')
                ->where(['pers_type' => 'real'])
                ->all();

            $temp = EduProg::find()
                ->where(['pers_type' => 'real'])->all();
            $edu_progs = array_merge($edu_progs, $temp);
        }
        if ($results->int_type >= 5) {
            $professions['int'] = Profession::find()
                ->select('name')
                ->where(['pers_type' => 'int'])
                ->all();

            $temp = EduProg::find()
                ->where(['pers_type' => 'int'])->all();
            $edu_progs = array_merge($edu_progs, $temp);
        }
        if ($results->soc_type >= 5) {
            $professions['soc'] = Profession::find()
                ->select('name')
                ->where(['pers_type' => 'soc'])
                ->all();

            $temp = EduProg::find()
                ->where(['pers_type' => 'soc'])->all();
            $edu_progs = array_merge($edu_progs, $temp);
        }
        if ($results->conv_type >= 5) {
            $professions['conv'] = Profession::find()
                ->select('name')
                ->where(['pers_type' => 'conv'])
                ->all();

            $temp = EduProg::find()
                ->where(['pers_type' => 'conv'])->all();
            $edu_progs = array_merge($edu_progs, $temp);
        }
        if ($results->ent_type >= 5) {
            $professions['ent'] = Profession::find()
                ->select('name')
                ->where(['pers_type' => 'ent'])
                ->all();

            $temp = EduProg::find()
                ->where(['pers_type' => 'ent'])->all();
            $edu_progs = array_merge($edu_progs, $temp);
        }
        if ($results->art_type >= 5) {
            $professions['art'] = Profession::find()
                ->select('name')
                ->where(['pers_type' => 'art'])
                ->all();

            $temp = EduProg::find()
                ->where(['pers_type' => 'art'])->all();
            $edu_progs = array_merge($edu_progs, $temp);
        }

        $pages = new Pagination(['totalCount' => count($edu_progs), 'pageSize' => 5]);
        $edu_progs = array_slice($edu_progs, $pages->getOffset(), $pages->getLimit(), true);

        return $this->render('profresult', compact('results', 'professions', 'edu_progs', 'pages'));
    }
}
