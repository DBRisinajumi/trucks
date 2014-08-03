<?php


class VtroTruckOdometerController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";
    public $menu_route = "trucks/vtroTruckOdometer";      


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
            'roles' => array('Trucks.VtroTruckOdometer.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtroTruckOdometer.Create'),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Trucks.VtroTruckOdometer.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtroTruckOdometer.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtroTruckOdometer.Delete'),
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

    public function actionView($vtro_id, $ajax = false)
    {
        $model = $this->loadModel($vtro_id);
        if($ajax){
            $this->renderPartial('_view-relations_grids', 
                    array(
                        'modelMain' => $model,
                        'ajax' => $ajax,
                        )
                    );
        }else{
            $this->render('view', array('model' => $model,));
        }
    }

    public function actionCreate()
    {
        $model = new VtroTruckOdometer;
        $model->scenario = $this->scenario;

        //$this->performAjaxValidation($model, 'vtro-truck-odometer-form');

        if (isset($_POST['VtroTruckOdometer'])) {
            $model->attributes = $_POST['VtroTruckOdometer'];
            $model->vtro_datetime = $model->vtro_date . ' ' . $model->vtro_time;

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('admin'));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtro_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtroTruckOdometer'])) {
            $model->attributes = $_GET['VtroTruckOdometer'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtro_id)
    {
        $model = $this->loadModel($vtro_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtro-truck-odometer-form');

        if (isset($_POST['VtroTruckOdometer'])) {
            $model->attributes = $_POST['VtroTruckOdometer'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtro_id' => $model->vtro_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtro_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        $es = new EditableSaver('VtroTruckOdometer'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value) 
    {
        $model = new VtroTruckOdometer;
        $model->$field = $value;
        try {
            if ($model->save()) {
                return TRUE;
            }else{
                return var_export($model->getErrors());
            }            
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }
    
    public function actionDelete($vtro_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtro_id)->delete();
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
            throw new CHttpException(400, Yii::t('TrucksModule.crud', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionAdmin()
    {
        $model = new VtroTruckOdometer('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtroTruckOdometer'])) {
            $model->attributes = $_GET['VtroTruckOdometer'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtroTruckOdometer::model();
        // apply scope, if available
        $scopes = $m->scopes();
        if (isset($scopes[$this->scope])) {
            $m->{$this->scope}();
        }
        $model = $m->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('TrucksModule.crud', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtro-truck-odometer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
