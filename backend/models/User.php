<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $mobile_update
 * @property integer $coe
 * @property integer $updates
 * @property integer $opt_in
 * @property integer $password_reset
 * @property integer $created_by_id
 * @property integer $updated_by_id
 * @property integer $allowcoecontact
 * @property integer $acceptedcoeterms
 * @property string $vinci_id
 * @property string $email
 * @property string $password
 * @property string $account_status
 * @property string $country
 * @property string $local_country
 * @property string $telnr
 * @property string $name
 * @property string $firstname
 * @property string $lastname
 * @property string $specialty
 * @property string $role
 * @property string $postcode
 * @property string $biologics
 * @property string $email_hash
 * @property string $domainsofinterest
 * @property string $acceptedcoeterms
 * @property date $last_logged_in
 * @property date $created_at
 * @property date $updated_at
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
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
                    'mobile_update',
                    'coe',
                    'updates',
                    'opt_in',
                    'password_reset',
                    'created_by_id',
                    'updated_by_id',
                    'allowcoecontact',
                    'acceptedcoeterms',
                ],
                'integer'
            ],
            [
                [
                    'vinci_id',
                    'email',
                    'password',
                    'account_status',
                    'country',
                    'local_country',
                    'telnr',
                    'name',
                    'firstname',
                    'lastname',
                    'specialty',
                    'role',
                    'postcode',
                    'biologics',
                    'email_hash',
                    'domainsofinterest',
                    'acceptedcoeterms',
                ],
                'string'
            ],
            [
                [
                    'last_logged_in',
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
            'vinci_id' => 'vinci_id',
            'email' => 'email',
            'password' => 'password',
            'account_status' => 'account_status',
            'country' => 'country',
            'local_country' => 'local_country',
            'mobile_update' => 'mobile_update',
            'telnr' => 'telnr',
            'name' => 'name',
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'specialty' => 'specialty',
            'role' => 'role',
            'coe' => 'coe',
            'updates' => 'updates',
            'opt_in' => 'opt_in',
            'postcode' => 'postcode',
            'biologics' => 'biologics',
            'password_reset' => 'password_reset',
            'last_logged_in' => 'last_logged_in',
            'created_at' => 'created_at',
            'created_by_id' => 'created_by_id',
            'updated_at' => 'updated_at',
            'updated_by_id' => 'updated_by_id',
            'email_hash' => 'email_hash',
            'allowcoecontact' => 'allowcoecontact',
            'domainsofinterest' => 'domainsofinterest',
            'aboutme' => 'aboutme',
            'acceptedcoeterms' => 'acceptedcoeterms',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vinci_id' => 'Vinci ID',
            'email' => 'Email',
            'password' => 'Password',
            'account_status' => 'Account Status',
            'country' => 'Country',
            'local_country' => 'Local Country',
            'mobile_update' => 'Mobile Update',
            'telnr' => 'Telnr',
            'name' => 'Name',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'specialty' => 'Specialty',
            'role' => 'Role',
            'coe' => 'Coe',
            'updates' => 'Updates',
            'opt_in' => 'Opt In',
            'postcode' => 'Postcode',
            'biologics' => 'Biologics',
            'password_reset' => 'Password Reset',
            'last_logged_in' => 'Last Logged In',
            'created_at' => 'Created At',
            'created_by_id' => 'Created By ID',
            'updated_at' => 'Updated At',
            'updated_by_id' => 'Updated By ID',
            'email_hash' => 'Email Hash',
            'allowcoecontact' => 'Allow Coe Contact',
            'domainsofinterest' => 'Domains Of Interest',
            'aboutme' => 'About Me',
            'acceptedcoeterms' => 'Accepted Coe Terms',
        ];
    }

    /**
     * @return array
     */
    public static function getTopViewers()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand(
            'SELECT user.id, user.email, COUNT(viewer.session_id) as sessionViews 
            FROM `user`
            INNER JOIN `viewer`
            ON user.id=viewer.user_id
            GROUP BY user.id, user.email
            ORDER BY sessionViews DESC'
        );

        return $command->queryAll();
    }
}
