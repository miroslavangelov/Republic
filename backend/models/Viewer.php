<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "viewer".
 *
 * @property integer $id
 * @property integer $session_id
 * @property integer $user_id
 * @property integer $ios
 * @property string $sessionid
 * @property string $language
 * @property string $type
 * @property string $request_uri
 * @property string $http_user_agent
 * @property string $ip
 * @property date $created_at
 * @property date $updated_at
 */
class Viewer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'viewer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'session_id',
                    'user_id',
                    'ios',
                ],
                'integer'
            ],
            [
                [
                    'sessionid',
                    'language',
                    'type',
                    'request_uri',
                    'http_user_agent',
                    'ip',
                ],
                'string'
            ],
            [
                [
                    'created_at',
                    'updated_at',
                ],
                'date'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id' => 'id',
            'sessionid' => 'sessionid',
            'session_id' => 'session_id',
            'language' => 'language',
            'type' => 'type',
            'user_id' => 'user_id',
            'request_uri' => 'request_uri',
            'http_user_agent' => 'http_user_agent',
            'ios' => 'ios',
            'ip' => 'ip',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sessionid' => 'Sessionid',
            'session_id' => 'Session ID',
            'language' => 'Language',
            'type' => 'Type',
            'user_id' => 'User ID',
            'request_uri' => 'Request URI',
            'http_user_agent' => 'HTTP User Agent',
            'ios' => 'IOS',
            'ip' => 'IP',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return int
     */
    public static function getAllCounts()
    {
        return (int)Viewer::find()
            ->count();
    }

    /**
     * @return int
     */
    public static function getUniqueViewers()
    {
        return (int)Viewer::find()
                ->select('user_id')
                ->distinct()
                ->count();
    }
    
    /**
     * @return array
     */
    public static function getBrowsers()
    {
        return Viewer::find()
                ->select('http_user_agent')
                ->distinct()
                ->all();
        }
}
