<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $dataProvider AuthItemDataProvider */

$this->breadcrumbs = array(
	$this->capitalize($this->getTypeText(true)),
);
?>

<h1><?php echo $this->capitalize($this->getTypeText(true)); ?></h1>

<?php $this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'link',
    'context' => 'primary',
    'label' => Yii::t('AuthModule.main', 'Add {type}', array('{type}' => $this->getTypeText())),
    'url' => array('create'),
)); ?>



<?php $this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped',
    'dataProvider' => $dataProvider,
    'emptyText' => Yii::t('AuthModule.main', 'No {type} found.', array('{type}'=>$this->getTypeText(true))),
	'template'=>"{items}\n{pager}",
    'columns' => array(
		array(
			'name' => 'name',
			'type'=>'raw',
			'header' => Yii::t('AuthModule.main', 'System name'),
			'htmlOptions' => array('class'=>'item-name-column'),
			'value' => "CHtml::link(\$data->name, array('view', 'name'=>\$data->name))",
		),
		array(
			'name' => 'description',
			'header' => Yii::t('AuthModule.main', 'Description'),
			'htmlOptions' => array('class'=>'item-description-column'),
		),
		array(
            'header' => '操作',
//            'htmlOptions' => array('style'=>'width:80px'),
            'htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'booster.widgets.TbButtonColumn',
			'viewButtonLabel' => Yii::t('AuthModule.main', 'View'),
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('name'=>\$data->name))",
			'updateButtonLabel' => Yii::t('AuthModule.main', 'Edit'),
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('name'=>\$data->name))",
			'deleteButtonLabel' => Yii::t('AuthModule.main', 'Delete'),
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('name'=>\$data->name))",
			'deleteConfirmation' => Yii::t('AuthModule.main', 'Are you sure you want to delete this item?'),
		),
    ),
)); ?>
