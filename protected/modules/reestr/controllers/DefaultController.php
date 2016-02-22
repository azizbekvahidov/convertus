<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{

        $this->render('index');
	}

    public function actionCreate(){

    }

    public function actionAddresses(){
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('addresses')
                    ->queryAll();
        $this->renderPartial('addresses',array(
            'model'=>$model
        ));
    }
}