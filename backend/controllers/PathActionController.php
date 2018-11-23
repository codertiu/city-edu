<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Languages;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;

/**
 * Site controller
 */
class PathActionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        //$this->controller->pageTitle=Yii::$app->params['settings']['title'];
        if (User::hasRole('call-center')) {
            return $this->render('call-center');
        } else if (User::hasRole('Admin')) {
            return $this->render('index');
        }

        //return $this->render('index');
    }

    public function actionLang($lang)
    {
        $query = Languages::find()->where('abb= "' . $lang . '" AND status>-1')->one();
        if ($query) {
            Yii::$app->session->set('language', $lang);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

}
