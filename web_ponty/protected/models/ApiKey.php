<?php

/**
 * This is the model class for table "api_keys".
 *
 * The followings are the available columns in table 'api_keys':
 * @property string $id
 * @property string $api_key
 * @property integer $blocked
 * @property string $valid_until
 * @property string $current_monthly_requests
 * @property integer $max_monthly_requests
 * @property string $created
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class ApiKey extends CActiveRecord
{
    public $email;
    public $contact_message;
    public $name;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'api_keys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('api_key, valid_until, app_name, app_link', 'required' ),
			array('blocked, max_monthly_requests, user_id', 'numerical', 'integerOnly'=>true),
			array('api_key', 'length', 'max'=>255),
            array('app_name, app_link', 'length', 'max'=>250),
			array('current_monthly_requests', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, api_key, blocked, valid_until, current_monthly_requests, max_monthly_requests, created, user_id', 'safe', 'on'=>'search'),
            array('email, name, contact_message', 'required', 'on' => 'keyRequestForm'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'api_key' => 'Key',
			'blocked' => 'Blocked',
			'valid_until' => 'Valid Until',
			'current_monthly_requests' => 'Current Requests/Month',
			'max_monthly_requests' => 'Max Requests/Month',
			'created' => 'Created',
			'user_id' => 'User',
            'app_name' => 'Name of the application',
            'app_link' => 'Link to the application',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

        if (strtolower($this->blocked) == 'yes') {
            $this->blocked = 1;
        }
        else if (strtolower($this->blocked) == 'no') {
            $this->blocked = 0;
        }
		$criteria->compare('id',$this->id,true);
		$criteria->compare('api_key',$this->api_key,true);
		$criteria->compare('blocked',$this->blocked);
		$criteria->compare('valid_until',$this->valid_until,true);
		$criteria->compare('current_monthly_requests',$this->current_monthly_requests,true);
		$criteria->compare('max_monthly_requests',$this->max_monthly_requests);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('user_id',$this->user_id);
        $criteria->compare('app_name',$this->app_name);
        $criteria->compare('app_link',$this->app_link);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApiKey the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
