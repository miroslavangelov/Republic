<?php

namespace app\controllers;

use yii\rest\ActiveController;

class ViewerController extends ActiveController {
    public $modelClass = 'app\models\Viewer';
    
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
     * @return int
     */
    public function actionAllCounts()
    {
        return $this->modelClass::getAllCounts();
    }

    /**
     * @return int
     */
    public function actionUniqueViewers()
    {
        return $this->modelClass::getUniqueViewers();
    }

    /**
     * @return array
     */
    public function actionBrowsers()
    {
        return $this->modelClass::getBrowsers();
    }
}

