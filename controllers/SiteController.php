<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Employee;
use app\models\Komentar;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHello($nama = null)
    {
        return $this->render('hello', [
            'nama' => $nama,
        ]);
    }

    public function actionUrl()
    {
        return $this->render('url');
    }

    public function actionKomentar()
    {
        $model = new \app\models\Komentar();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'Terima kasih ');
            } else {
                Yii::$app->session->setFlash('error', 'Maaf, salah!');
            }
            return $this->render('hasil_komentar', [
                'model' => $model,
            ]);
        } else {
            return $this->render('komentar', [
                'model' => $model,
            ]);
        }
    }

    public function actionQuery()
    {
        $db = Yii::$app->db;
        $employee = $db->createCommand('SELECT * FROM EMPLOYEE WHERE ID=:ID', ['ID' => 2])->queryOne();
        // $employees = $command->queryAll();
        //ekstrak data
        // foreach ($employees as $employee) {
        echo "<br>";
        echo $employee['ID'] . ". ";
        echo $employee['NAME'] . " ";
        echo "(" . $employee['AGE'] . ") ";
        echo "<hr>";
        // }

        $names = $db->createCommand('SELECT NAME FROM EMPLOYEE')->queryColumn();
        print_r($names);
        echo "<hr>";

        $count = $db->createCommand('SELECT COUNT(*) FROM EMPLOYEE')->queryScalar();
        echo "Total Jumlah Data Pekerja adalah " . $count;
        echo "<hr>";

        $row_affected = $db->createCommand('UPDATE EMPLOYEE SET AGE=22 WHERE ID=2')->execute();
        echo $row_affected . ' row affected';
    }

    public function actionActiveRecord()
    {
        // $employees = Employee::find()->all();
        // foreach ($employees as $employee) {
        //     echo "<br>";
        //     echo $employee->ID . ". ";
        //     echo $employee->NAME . " ";
        //     echo "(" . $employee->AGE. ") ";
        //     echo "<hr>";
        //     // echo "<br>";
        //     // echo $employee->ID . " ";
        //     // echo $employee->NAME . " ";
        //     // echo "(" . $employee->AGE . ") ";
        // }

        // $employee = Employee::find()
        // ->where('ID=2')
        // ->one();

        // echo $employee->NAME;

        $employees = Employee::find()
            ->where(['>', 'age', 25])
            ->orderBy('id')
            ->all();
        print_r($employees);

        $count = Employee::find()
            ->count();
        echo $count;
    }
}
