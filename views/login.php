<?php
    /** @var $model \app\models\User */
    use app\core\form\Form;
?>
<div class="card">
    <div class="card-header bg-black text-white">Login</div>
    <div class="card-body">
        <?php $form = Form::begin('', 'post')?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        <?php Form::end()?>
    </div>
</div>