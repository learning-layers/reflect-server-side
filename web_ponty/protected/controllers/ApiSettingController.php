<?php

class ApiSettingController extends Controller
{
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'expression' => '$user->isAdmin',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionedit()
    {
        $api_settings = ApiSetting::model()->findByPk('1');

        if ($api_settings == NULL)
            $api_settings = new ApiSetting();

        if (isset($_POST['ApiSetting'])) {
            $api_settings->attributes = $_POST['ApiSetting'];
            if ($api_settings->save()) {
                Yii::app()->user->setFlash('success', 'API settings have been saved!');
            } else {
                Yii::app()->user->setFlash('error', 'A error occurred while trying to save the API settings!');
            }
        }

        $this->render('edit', array('model' => $api_settings));
    }


}