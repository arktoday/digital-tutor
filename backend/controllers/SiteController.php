<?php

namespace backend\controllers;

use backend\models\SignupForm;
use common\models\ProfResultSearch;
use common\models\TestAnsw;
use common\models\TestQuest;
use common\models\Tests;
use common\models\TestTheme;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'tests', 'test-create', 'writedbtest', 'signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionTests()
    {
        $tests = TestTheme::find()->all();

        return $this->render('tests', compact('tests'));
    }

    public function actionTestCreate()
    {
        return $this->render('test-create');
    }

    public function actionWritedbtest()
    {
        $tests = $this->request->get();
        $testThemeModel = new TestTheme();

        $testThemeModel->name = $tests['testname'];
        $testThemeModel->subj_id = $tests['subj'];
        $testThemeModel->save();

        if (is_array($tests))
            foreach ($tests['questions'] as $quest) {
                $testsModel = new Tests();
                $testQuestModel = new TestQuest();
                $testQuestModel->value = $quest['name'];
                $testQuestModel->quest_type = $quest['type'];
                $testQuestModel->save();
                foreach ($quest['answ'] as $key => $answ) {
                    $testAnswModel = new TestAnsw();
                    $testAnswModel->value = '' . $key;
                    $testAnswModel->isright = '' . $answ;
                    $testAnswModel->quest_id = $testQuestModel->id;
                    $testAnswModel->save();
                }
                $testsModel->test_id = $testThemeModel->id;
                $testsModel->quest_id = $testQuestModel->id;
                $testsModel->save();
            }
        else print_r($tests);

        $this->redirect('tests');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
