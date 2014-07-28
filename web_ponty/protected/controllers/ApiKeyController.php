<?php

class ApiKeyController extends Controller
{

    public function actionIndex()
    {

        $apiKey = $this->loadApiKeyByUserId();

        if ($apiKey === null)
            $apiKey = new ApiKey();

        if ($apiKey->blocked == 1 && $apiKey->api_key != null)
            $apiKey->api_key = 'Not visible yet';

        $this->render('index', array(
            'model' => $apiKey,
        ));
    }

    public function loadApiKeyByUserId()
    {
        $model = ApiKey::model()->find('user_id=:userId', array(':userId' => Yii::app()->user->id));
        return $model;
    }

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('acceptApiRequest', 'declineApiRequest'),
                'users' => array('*')),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'requestKey'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionrequestKey()
    {
        $apiKey = $this->loadApiKeyByUserId();

        if ($apiKey == null) {

            $apiKey = new apiKey('keyRequestForm');
            $apiKey->email = Yii::app()->user->getState('email');

            $this->validateAjax($apiKey, 'requestKey-form');

            if (isset($_POST['ApiKey'])) {
                $apiKey->attributes = $_POST['ApiKey'];

                $apiKey->api_key = sha1(uniqid() . $apiKey->email);

                $api_settings = ApiSetting::model()->findByPk('1');

                $apiKey->max_monthly_requests = $api_settings->max_requests;

                // Get Timestamp and add time to be valid
                $date = date("Y-m-d H:i:s");
                // $date = date('Y-m-d H:i:s', strtotime($date. ' + 1 days'));
                $date = date('Y-m-d H:i:s', strtotime($date. ' + ' .$api_settings->valid_for . ' days'));

                $valid_until = $date;


                $apiKey->valid_until = $valid_until;

                $apiKey->user_id = Yii::app()->user->id;

                // Search actually logged in user and add name to the record
                $user = User::model()->findByPk(Yii::app()->user->id);
                $user->name = $apiKey->name;

                if ($apiKey->save() && $user->save()) {

                    // Generate Accept Url
                    $accept_url = $this->createAbsoluteUrl('apiKey/acceptApiRequest', array('key' => $apiKey->api_key));

                    // Generate Decline Url
                    $decline_url = $this->createAbsoluteUrl('apiKey/declineApiRequest', array('key' => $apiKey->api_key));

                    //Start Mailing
                    $mail = new YiiMailMessage;
                    $mail->view = 'apiKeyRequest';

                    $mail->setBody(array('name' => $apiKey->name, 'email' => $apiKey->email, 'app_name' => $apiKey->app_name, 'app_link' => $apiKey->app_link, 'contact_message' => $apiKey->contact_message, 'accept_link' => $accept_url, 'decline_link' => $decline_url), 'text/html');
                    $mail->setSubject('API Key Request for Reflect');
                    $mail->addTo($apiKey->email);
                    $mail->from = Yii::app()->params['adminEmail'];
                    Yii::app()->mail->send($mail);

                    Yii::app()->user->setFlash('success', 'Your request has been send to the Pontydysgu team. Please be patient until you get a repsonse.');
                    $this->redirect(array('apiKey/index'));
                } else {
                    Yii::app()->user->setFlash('error', 'A error occurred. Please contact the support.');
                }
            }
            $this->render('requestKey', array('model' => $apiKey));
        } else {
            Yii::app()->user->setFlash('error', 'You already have access to the Reflect API. Please contact the support for further information.');
            $this->redirect(array('apiKey/index'));
        }

    }

    public function actionacceptApiRequest()
    {
        // Extract API key from URL and search api_key record in db
        $key = Yii::app()->request->getQuery('key');
        $api_key = ApiKey::model()->find('api_key=:apiKey', array(':apiKey' => $key));
        if ($api_key) {
            $api_key->blocked = 0;

            // Find user to the api_key
            $api_user = User::model()->find('id=:id', array(':id' => $api_key->user_id));
            if ($api_key->save() && $api_user != NULL) {

                //Send mail to user
                $mail = new YiiMailMessage;
                $mail->view = 'apiKeyAnswer';

                $decision = "Your Request has been accepted. Please check out the Webinterface for your API Key!";

                $mail->setBody(array('name' => $api_user->name, 'decision' => $decision), 'text/html');
                $mail->setSubject('Request for the Reflect API');
                $mail->addTo($api_user->email);
                $mail->from = Yii::app()->params['adminEmail'];
                Yii::app()->mail->send($mail);

                Yii::app()->user->setFlash('success', 'Users API request has been successfully activated!');
            } else {
                Yii::app()->user->setFlash('error', 'Error while trying to activate the users API Key!');
            }

        }
        $this->render('acceptApiRequest');
    }

    public function actiondeclineApiRequest()
    {
        // Extract API key from URL and search api_key record in db
        $key = Yii::app()->request->getQuery('key');
        $api_key = ApiKey::model()->find('api_key=:apiKey', array(':apiKey' => $key));
        if ($api_key) {

            $api_key->blocked = 1;
            // Find user to the api_key
            $api_user = User::model()->find('id=:id', array(':id' => $api_key->user_id));
            if ($api_key->save() && $api_user != NULL) {

                //Send mail to user
                $mail = new YiiMailMessage;
                $mail->view = 'apiKeyAnswer';

                $decision = "We're sorry, your Request has been declined. Please contact the Reflect Support by usíng the Contact Form if you have any questions.";

                $mail->setBody(array('name' => $api_user->name, 'decision' => $decision), 'text/html');
                $mail->setSubject('Request for the Reflect API');
                $mail->addTo($api_user->email);
                $mail->from = Yii::app()->params['adminEmail'];
                Yii::app()->mail->send($mail);

                Yii::app()->user->setFlash('success', 'Users API request has been successfully declined!');
            } else {
                Yii::app()->user->setFlash('error', 'Error while trying to decline the users API Key!');
            }

        }
        $this->render('declineApiRequest');
    }
}