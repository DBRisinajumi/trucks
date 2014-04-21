<?php


class VtrcTruckController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";
    public $menu_route = "trucks/vtrcTruck";  

public function filters()
{
    return array(
        'accessControl',
    );
}

public function accessRules()
{
     return array(
        array(
            'allow',
            'actions' => array('create', 'admin', 'view', 'update', 'editableSaver', 'delete','ajaxCreate'),
            'roles' => array('Trucks.VtrcTruck.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtrcTruck.Create'),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Trucks.VtrcTruck.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtrcTruck.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtrcTruck.Delete'),
        ),
        array(
            'deny',
            'users' => array('*'),
        ),
    );
}

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionView($vtrc_id)
    {
        $model = $this->loadModel($vtrc_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new VtrcTruck;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtrc-truck-form');

        if (isset($_POST['VtrcTruck'])) {
            $model->attributes = $_POST['VtrcTruck'];
            
            //set company id
            if (Yii::app()->sysCompany->getActiveCompany()){
                $model->vtrc_cmmp_id = Yii::app()->sysCompany->getActiveCompany();
            }     
            
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtrc_id' => $model->vtrc_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtrc_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtrcTruck'])) {
            $model->attributes = $_GET['VtrcTruck'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtrc_id)
    {
        $model = $this->loadModel($vtrc_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtrc-truck-form');

        if (isset($_POST['VtrcTruck'])) {
            $model->attributes = $_POST['VtrcTruck'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtrc_id' => $model->vtrc_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtrc_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('TbEditableSaver');
        $es = new TbEditableSaver('VtrcTruck'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value, $no_ajax = 0) 
    {
        $model = new VtrcTruck;
        $model->$field = $value;
        try {
            if ($model->save()) {
                if($no_ajax){
                    $this->redirect(Yii::app()->request->urlReferrer);
                }            
                return TRUE;
            }
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }
    
    public function actionDelete($vtrc_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtrc_id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        } else {
            throw new CHttpException(400, Yii::t('TrucksModule.crud_static', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionAdmin()
    {
        $model = new VtrcTruck('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtrcTruck'])) {
            $model->attributes = $_GET['VtrcTruck'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtrcTruck::model();
        // apply scope, if available
        $scopes = $m->scopes();
        if (isset($scopes[$this->scope])) {
            $m->{$this->scope}();
        }
        $model = $m->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('TrucksModule.crud_static', 'The requested page does not exist.'));
        }
        
		if (Yii::app()->sysCompany->getActiveCompany()){
            if( !Yii::app()->sysCompany->isValidUserCompany($model->vtrc_cmmp_id)){
                throw new CHttpException(404, Yii::t('TrucksModule.crud_static', 'Requested closed data.'));
            }    
        }  
        
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtrc-truck-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
