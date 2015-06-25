<?php
use \yii;
use \yii\helpers\Url;
use \yii\helpers\Html;
?>
<tr>
    <?php $id = (string) $model['_id']; ?>
    
    <td><?= Html::encode($id); ?></td>
    <td><?= Html::encode($model->username); ?></td>
    <td><?= Html::encode($model->password); ?></td>
    <td><?= Yii::$app->formatter->asDatetime($model->create_time) ?></td>
    <td><?= Yii::$app->formatter->asDatetime($model->update_time) ?></td>
    <td>
        <a href="<?=Url::toRoute(['user/update', '_id'=>$id ]); ?>"> 編集 </a>
        <a href="<?=Url::toRoute(['user/delete', '_id'=>$id ]); ?>"> 削除 </a>
    </td>
</tr>
