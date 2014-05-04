<?php


class VtdcTruckDocController extends Controller
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
            'roles' => array('Trucks.VtdcTruckDoc.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtdcTruckDoc.Create'),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Trucks.VtdcTruckDoc.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtdcTruckDoc.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtdcTruckDoc.Delete'),
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

    public function actionView($vtdc_id)
    {
        $model = $this->loadModel($vtdc_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new VtdcTruckDoc;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtdc-truck-doc-form');

        if (isset($_POST['VtdcTruckDoc'])) {
            $model->attributes = $_POST['VtdcTruckDoc'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtdc_id' => $model->vtdc_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtdc_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtdcTruckDoc'])) {
            $model->attributes = $_GET['VtdcTruckDoc'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtdc_id)
    {
        $model = $this->loadModel($vtdc_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtdc-truck-doc-form');

        if (isset($_POST['VtdcTruckDoc'])) {
            $model->attributes = $_POST['VtdcTruckDoc'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtdc_id' => $model->vtdc_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtdc_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('TbEditableSaver');
        $es = new TbEditableSaver('VtdcTruckDoc'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value, $no_ajax = 0) 
    {
        $model = new VtdcTruckDoc;
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
    
    public function actionDelete($vtdc_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtdc_id)->delete();
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
        $model = new VtdcTruckDoc('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtdcTruckDoc'])) {
            $model->attributes = $_GET['VtdcTruckDoc'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtdcTruckDoc::model();
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtdc-truck-doc-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
