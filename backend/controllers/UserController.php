<?php

namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController {
    public $modelClass = 'app\models\User';
    
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

    /**
     * @return array
     */
    public function actionTopViewers()
    {
        return $this->modelClass::getTopViewers();
    }
}

