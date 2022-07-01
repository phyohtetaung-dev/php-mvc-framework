<?php
/** @var $model \app\models\User */
use phyohtetaung\phpmvc\form\Form;
?>
<div class="card">
    <div class="card-header bg-black text-white">Login</div>
    <div class="card-body">
        <?php $form = Form::begin('', 'post')?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/register" class="ms-1">Don't have an account?</a>
        <?php Form::end()?>
    </div>
</div>