<?php

namespace app\controllers;

use yii\rest\ActiveController;

class SessionController extends ActiveController {
    public $modelClass = 'app\models\Session';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        unset($behaviors['authenticator']);
        unset($behaviors['rateLimiter']);
        
        return $behaviors;
    }
    
    public function actionMostPopular()
    {
        return $this->modelClass::getMostPopular();
    }
}

