<?php 
use yii\helpers\Html;
?>
<ul class="main-menu">
    <li class="sub-header">
        <span>Master</span>
    </li>
    <li class="selected">
        <?=Html::a('<div class="icon-w"><div class="os-icon os-icon-pocket"></div></div><span>Facility Home</span>',['/']);?>
    </li>
    <li class="selected">
        <?=Html::a('<div class="icon-w"><div class="os-icon os-icon-eye"></div></div><span>Generate reports</span>','#');?>
    </li>
    <li class="selected">
        <?=Html::a('<div class="icon-w"><div class="os-icon os-icon-edit-32"></div></div><span>Add New Patients</span>',['/patient/create']);?>
    </li>

    <li class="selected">
        <?=Html::a('<div class="icon-w"><div class="os-icon os-icon-file-text"></div></div><span>Change Facility</span>',['/cheque/issued']);?>
    </li>

    <li class="sub-header">
        <span>Settings</span>
    </li>
    <li class=" has-sub-menu">
        <li class="selected">
        <?=Html::a('<div class="icon-w"><div class="os-icon os-icon-log-out"></div></div><span>Log Out</span>',['/site/log-out'],['data-method' => 'post']);?>
    </li>
</ul>