<?php


class VtcoTrucOdoChangesController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";
    public $menu_route = "trucks/vtcoTrucOdoChanges";      


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
            'roles' => array('Trucks.VtcoTrucOdoChanges.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtcoTrucOdoChanges.Create'),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Trucks.VtcoTrucOdoChanges.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtcoTrucOdoChanges.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtcoTrucOdoChanges.Delete'),
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

    public function actionView($vtco_id, $ajax = false)
    {
        $model = $this->loadModel($vtco_id);
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
        $model = new VtcoTrucOdoChanges;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtco-truc-odo-changes-form');

        if (isset($_POST['VtcoTrucOdoChanges'])) {
            $model->attributes = $_POST['VtcoTrucOdoChanges'];
            $model->vtco_datetime = $model->vtco_date . ' ' . $model->vtco_time;

            try {
                if ($model->save()) {
                    
                    $vtro_model = VtroTruckOdometer::model();
                    $vtro_model->vtro_vtrc_id = $model->vtco_vtrc_id;
                    $vtro_model->vtro_datetime = $model->vtco_datetime;
                    $vtro_model->vtro_odo = $model->vtco_old_odo;
                    $vtro_model->save();
                    $model->vtco_vtro_id = $vtro_model->vtro_id;
                    $model->save();
                    
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtco_id' => $model->vtco_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtco_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtcoTrucOdoChanges'])) {
            $model->attributes = $_GET['VtcoTrucOdoChanges'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtco_id)
    {
        $model = $this->loadModel($vtco_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtco-truc-odo-changes-form');

        if (isset($_POST['VtcoTrucOdoChanges'])) {
            $model->attributes = $_POST['VtcoTrucOdoChanges'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtco_id' => $model->vtco_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtco_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        $es = new EditableSaver('VtcoTrucOdoChanges'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value) 
    {
        $model = new VtcoTrucOdoChanges;
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
    
    public function actionDelete($vtco_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtco_id)->delete();
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
        $model = new VtcoTrucOdoChanges('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtcoTrucOdoChanges'])) {
            $model->attributes = $_GET['VtcoTrucOdoChanges'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtcoTrucOdoChanges::model();
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtco-truc-odo-changes-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
