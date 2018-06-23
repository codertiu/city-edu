<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Languages;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionLang($lang) {
        $query = Languages::find()->where('abb= "'.$lang.'" AND status>-1')->one();
        if($query || $lang == Yii::$app->params['main_language']) {
//          $lang_id = $lang == Yii::$app->params['main_language'] ? Yii::$app->params['main_language_id'] : $query->id;
            $lang_id = $lang == Yii::$app->params['main_language'] ? 3 : $query->id;
            Yii::$app->language = $lang;
            Yii::$app->session->set('lang', $lang);
            Yii::$app->session->set('lang_id', $lang_id);
            $rescookies = \Yii::$app->response->cookies;
            $rescookies->add(new \yii\web\Cookie(['name' => '_language', 'value' => $lang, 'expire' => (time() + 3600 * 24 * 365)]));
            $rescookies->add(new \yii\web\Cookie(['name' => '_lid', 'value' => $lang_id, 'expire' => (time() + 3600 * 24 * 365)]));
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$this->controller->pageTitle=Yii::$app->params['settings']['title'];
        return $this->render('index');
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
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
}
