<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $this->render('index');
	}

    public function actionCreate(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else{
            $dates = date('Y-m-d H:i:s');
            /*Yii::app()->db->createCommand()->insert('reestr',array(
                'reestrDate'=>$dates,
                'userId'=>1
            ));*/
            $id = 1;//Yii::app()->db->getLastInsertID();
        }
        $model = Yii::app()->db->createCommand()
            ->select()
            ->from('reestr r')
            ->where('r.reestrId = :id',array(':id'=>$id))
            ->queryRow();
        $models = Yii::app()->db->createCommand()
                    ->select()
                    ->from('reestrAddr r')
                    ->where('r.reestrId = :id',array(':id'=>$model['reestrId']))
                    ->queryAll();
        $this->render('create',array(
            'model'=>$model,
            'models'=>$models,
        ));
    }

    public function actionList(){
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('reestr')
                    ->queryAll();
        $this->render('list',array(
            'model'=>$model,
        ));
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