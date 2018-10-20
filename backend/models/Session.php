<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "session".
 *
 * @property integer $id
 * @property integer $vem
 * @property integer $in_frame
 * @property integer $viewer_window_action
 * @property integer $viewer_button_status
 * @property integer $question_option
 * @property integer $presenter_id
 * @property integer $cme_accr
 * @property integer $minutes
 * @property integer $created_by_id
 * @property integer updated_by_id
 * @property string $subject
 * @property string $tags
 * @property string $status
 * @property string $title
 * @property string $description
 * @property string $mediasite_url
 * @property string $ios_url
 * @property string $external_url
 * @property string $custom_info_message
 * @property string $speaker_q_and_a_names
 * @property string $course
 * @property string $coursename
 * @property string $author
 * @property string $points
 * @property string $thumbnail
 * @property date $datetime
 * @property date $created_at
 * @property date $updated_at
 */
class Session extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session';
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
                    'vem',
                    'in_frame',
                    'viewer_window_action',
                    'viewer_button_status',
                    'question_option',
                    'presenter_id',
                    'cme_accr',
                    'minutes',
                    'created_by_id',
                    'updated_by_id',
                ],
                'integer'
            ],
            [
                [
                    'subject',
                    'tags',
                    'status',
                    'title',
                    'description',
                    'mediasite_url',
                    'ios_url',
                    'external_url',
                    'custom_info_message',
                    'custom_evaluation_message',
                    'speaker_q_and_a_names',
                    'course',
                    'coursename',
                    'author',
                    'points',
                    'thumbnail',
                ],
                'string'
            ],
            [
                [
                    'datetime',
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
            'subject' => 'subject',
            'vem' => 'vem',
            'tags' => 'tags',
            'event_id' => 'event_id',
            'status' => 'status',
            'title' => 'title',
            'description' => 'description',
            'datetime' => 'datetime',
            'mediasite_url' => 'mediasite_url',
            'ios_url' => 'ios_url',
            'external_url' => 'external_url',
            'in_frame' => 'in_frame',
            'viewer_window_action' => 'viewer_window_action',
            'viewer_button_status' => 'viewer_button_status',
            'custom_info_message' => 'custom_info_message',
            'evaluation_status' => 'evaluation_status',
            'custom_evaluation_message' => 'custom_evaluation_message',
            'question_option' => 'question_option',
            'speaker_q_and_a_names' => 'speaker_q_and_a_names',
            'presenter_id' => 'presenter_id',
            'cme_accr' => 'cme_accr',
            'minutes' => 'minutes',
            'course' => 'course',
            'coursename' => 'coursename',
            'author' => 'author',
            'points' => 'points',
            'thumbnail' => 'thumbnail',
            'created_at' => 'created_at',
            'created_by_id' => 'created_by_id',
            'updated_at' => 'updated_at',
            'updated_by_id' => 'updated_by_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'vem' => 'Vem',
            'tags' => 'tags',
            'event_id' => 'Event ID',
            'status' => 'Status',
            'title' => 'Title',
            'description' => 'Description',
            'datetime' => 'Datetime',
            'mediasite_url' => 'Mediasite URL',
            'ios_url' => 'IOS URL',
            'external_url' => 'External URL',
            'in_frame' => 'In Frame',
            'viewer_window_action' => 'Viewer Window Action',
            'viewer_button_status' => 'Viewer Button Status',
            'custom_info_message' => 'Custom Info Message',
            'evaluation_status' => 'Evaluation Status',
            'custom_evaluation_message' => 'Custom Evaluation Message',
            'question_option' => 'Question Option',
            'speaker_q_and_a_names' => 'Speaker Q And A Names',
            'presenter_id' => 'Presenter ID',
            'cme_accr' => 'Cme Accr',
            'minutes' => 'Minutes',
            'course' => 'Course',
            'coursename' => 'Coursename',
            'author' => 'Author',
            'points' => 'Points',
            'thumbnail' => 'Thumbnail',
            'created_at' => 'Created At',
            'created_by_id' => 'Created By ID',
            'updated_at' => 'Updated At',
            'updated_by_id' => 'Updated By ID',
        ];
    }

    /**
     * @return array
     */
    public static function getMostPopular()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand(
            'SELECT session.title, COUNT(session_id) as sessionViews 
            FROM viewer
            INNER JOIN session
            ON viewer.session_id=session.id
            GROUP BY viewer.session_id
            ORDER By sessionViews DESC'
        );

        return $command->queryAll();
    }
}
