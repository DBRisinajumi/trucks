<?php


class VtrsTruckServiceController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";


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
            'roles' => array('Trucks.VtrsTruckService.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtrsTruckService.Create'),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Trucks.VtrsTruckService.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtrsTruckService.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtrsTruckService.Delete'),
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

    public function actionView($vtrs_id)
    {
        $model = $this->loadModel($vtrs_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new VtrsTruckService;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtrs-truck-service-form');

        if (isset($_POST['VtrsTruckService'])) {
            $model->attributes = $_POST['VtrsTruckService'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtrs_id' => $model->vtrs_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtrs_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtrsTruckService'])) {
            $model->attributes = $_GET['VtrsTruckService'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtrs_id)
    {
        $model = $this->loadModel($vtrs_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtrs-truck-service-form');

        if (isset($_POST['VtrsTruckService'])) {
            $model->attributes = $_POST['VtrsTruckService'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtrs_id' => $model->vtrs_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtrs_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('TbEditableSaver');
        $es = new TbEditableSaver('VtrsTruckService'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value, $no_ajax = 0) 
    {
        $model = new VtrsTruckService;
        $model->$field = $value;
        try {
            if ($model->save()) {
                if($no_ajax){
                    $this->redirect(Yii::app()->request->urlReferrer);
                }            
                return TRUE;
            }else{
                return var_export($model->getErrors());
            }            
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }
    
    public function actionDelete($vtrs_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtrs_id)->delete();
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
        $model = new VtrsTruckService('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtrsTruckService'])) {
            $model->attributes = $_GET['VtrsTruckService'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtrsTruckService::model();
        // apply scope, if available
        $scopes = $m->scopes();
        if (isset($scopes[$this->scope])) {
            $m->{$this->scope}();
        }
        $model = $m->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('TrucksModule.crud_static', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtrs-truck-service-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
