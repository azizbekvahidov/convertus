<?
class RegionController extends Controller
{
    public function actionCreate(){
        $model = new Region();
        $list = $model->getRegionListByParentId(0);
        $this->render('create',array(
            'list'=>$list
        ));
    }

    public function actionCheckParent(){
        $id = $_POST['val'];
        $region = new Region();
        $model = $region->getRegionListByParentId($id);
        if(!empty($model)) {
            $this->renderPartial('checkParent', array());
        }
        else{
            echo "null";
        }
    }
}