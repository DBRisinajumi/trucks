<?php


class VtrdTrailerDocController extends Controller
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
            'roles' => array('Trucks.VtrdTrailerDoc.*'),
        ),
        array(
            'allow',
            'actions' => array('create','ajaxCreate'),
            'roles' => array('Trucks.VtrdTrailerDoc.Create'),
        ),
        array(
            'allow',
            'actions' => array('view', 'admin'), // let the user view the grid
            'roles' => array('Trucks.VtrdTrailerDoc.View'),
        ),
        array(
            'allow',
            'actions' => array('update', 'editableSaver'),
            'roles' => array('Trucks.VtrdTrailerDoc.Update'),
        ),
        array(
            'allow',
            'actions' => array('delete'),
            'roles' => array('Trucks.VtrdTrailerDoc.Delete'),
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

    public function actionView($vtrd_id)
    {
        $model = $this->loadModel($vtrd_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new VtrdTrailerDoc;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtrd-trailer-doc-form');

        if (isset($_POST['VtrdTrailerDoc'])) {
            $model->attributes = $_POST['VtrdTrailerDoc'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtrd_id' => $model->vtrd_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtrd_id', $e->getMessage());
            }
        } elseif (isset($_GET['VtrdTrailerDoc'])) {
            $model->attributes = $_GET['VtrdTrailerDoc'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($vtrd_id)
    {
        $model = $this->loadModel($vtrd_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'vtrd-trailer-doc-form');

        if (isset($_POST['VtrdTrailerDoc'])) {
            $model->attributes = $_POST['VtrdTrailerDoc'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'vtrd_id' => $model->vtrd_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('vtrd_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('TbEditableSaver');
        $es = new TbEditableSaver('VtrdTrailerDoc'); // classname of model to be updated
        $es->update();
    }

    public function actionAjaxCreate($field, $value, $no_ajax = 0) 
    {
        $model = new VtrdTrailerDoc;
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
    
    public function actionDelete($vtrd_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($vtrd_id)->delete();
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
        $model = new VtrdTrailerDoc('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['VtrdTrailerDoc'])) {
            $model->attributes = $_GET['VtrdTrailerDoc'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = VtrdTrailerDoc::model();
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vtrd-trailer-doc-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
