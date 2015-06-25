<?php
/* @var $this yii\web\View */
use \Yii;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\Url;

$this->title = '用户一览表';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h4><a href="<?= Url::toRoute(['user/create'])?>">添加用户</a></h4>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-lg-12">
                <p>检索用户</p>
                
                <?php $form = ActiveForm::begin([
                    'id' => 'create-form',
                    'method' => 'get',
                    'action' => ['user/index'],
                    'fieldConfig' => [ 
                        //'template' => "{input}",
                    ],
                ]); ?>

                    <?= $form->field($userform, 'username')->textInput() ?>

                    <?= $form->field($userform, 'password')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('检索', ['class' => 'btn btn-primary btn-sm', 'name' => 'create-button']) ?>
                        <?= Html::resetButton('清空', ['class' => 'btn btn-danger btn-sm', 'name' => 'reset-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="col-lg-12">
                <h4>用户一览表</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-condensed">
                        <tr>
                            <th class="center">ID</th>
                            <th class="center">用户名</th>
                            <th class="center">密码</th>
                            <th class="center">添加日期</th>
                            <th class="center">更新日期</th>
                            <th class="center">操作</th>
                        </tr>
                        <?= $listview = \yii\widgets\ListView::widget([
                                'dataProvider' => $dataProvider,
                                'viewParams'=>[],
                                //'itemOptions' => ['class' => 'items', 'tag' => false,],
                                'itemView' => '_view',

                                #设置表格内容，分页，摘要的位置
                                'layout' => "{items} </table> \n{summary}\n {pager}",
                                #设置摘要的显示格式
                                'summary' => '<div class="summary">{begin}件 - {end}件 / 全{totalCount}件</div>',
                                
                                #自定义分页组件
                                'pager' => ['class'=>'app\components\widgets\LinkPager'],
                            ]); ?>

                    </table>
                </div>
                
            </div>
        </div>

    </div>
</div>
