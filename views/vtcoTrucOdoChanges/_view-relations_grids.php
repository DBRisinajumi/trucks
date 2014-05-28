<?php
if(!$ajax){
    Yii::app()->clientScript->registerCss('rel_grid',' 
            .grid-view {padding-top:0px;margin-top: -35px;}
            h3.rel_grid{padding-left: 40px;}
            ');     
}
?>