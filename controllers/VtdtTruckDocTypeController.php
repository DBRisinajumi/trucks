<?php


class VtdtTruckDocTypeController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";
    public $menu_route = 'trucks/vtdtTruckDocType';


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
            'actions' => array('create', 'admin', 'update', 'editableSaver', 'delete','ajaxCreate'),
            'roles' => array('Trucks.VtdtTruckDocType.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtdtTruckDocType.Create'),
        ),
        array(
            'allow',
            'actions' => array('admin'), // let the user view the grid
            'roles' => array('Trucks.VtdtTruckDocType.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtdtTruckDocType.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtdtTruckDocType.Delete'),
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

    public function actionCreate()
    {
        $model = new VtdtTruckDocType;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtdt-truck-doc-type-form');

        if (isset($_POST['VtdtTruckDocType'])) {
            $model->attributes = $_POST['VtdtTruckDocType'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('admin'));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtdt_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtdtTruckDocType'])) {
            $model->attributes = $_GET['VtdtTruckDocType'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtdt_id)
    {
        $model = $this->loadModel($vtdt_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtdt-truck-doc-type-form');

        if (isset($_POST['VtdtTruckDocType'])) {
            $model->attributes = $_POST['VtdtTruckDocType'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('admin'));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtdt_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        $es = new EditableSaver('VtdtTruckDocType'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value, $no_ajax = 0) 
    {
        $model = new VtdtTruckDocType;
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
    
    public function actionDelete($vtdt_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtdt_id)->delete();
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
        $model = new VtdtTruckDocType('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtdtTruckDocType'])) {
            $model->attributes = $_GET['VtdtTruckDocType'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtdtTruckDocType::model();
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtdt-truck-doc-type-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
