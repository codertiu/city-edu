<?php


namespace common\components;

use Yii;
use yii\base\Component;


class Language extends Component
{
    public $iso;
    public $id;
    public $defaultId;
    public function init() {
        parent::init();
        if(is_a(Yii::$app,'yii\web\Application')){
            $session = Yii::$app->session;
            $cookies = Yii::$app->request->cookies;
            $clang = $cookies->getValue('_language', false);
            $clangid = $cookies->getValue('_lid', false);
            $this->defaultId = Yii::$app->params['main_language_id'];
            if ($session->has('lang') && $session->has('lang_id')) {
                Yii::$app->language = $session->get('lang');
                $this->iso = Yii::$app->language;
                $this->id = $session->get('lang_id');
            } else if ($clang && $clangid) {
                Yii::$app->language = $clang;
                $this->iso = Yii::$app->language;
                $this->id = $clangid;
            } else {
                Yii::$app->language = Yii::$app->params['main_language'];
                $session->set('lang', Yii::$app->params['main_language']);
                $session->set('lang_id', Yii::$app->params['main_language_id']);
                $this->iso = Yii::$app->language;
                $this->id = $session->get('lang_id');
            }
        }
    }
}

