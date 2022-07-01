<?php
/** @var $model \app\models\User */
use phyohtetaung\phpmvc\form\Form;
?>
<div class="card">
    <div class="card-header bg-black text-white">Create an account</div>
    <div class="card-body">
        <?php $form = Form::begin('', 'post')?>
            <?php echo $form->field($model, 'firstname') ?>
            <?php echo $form->field($model, 'lastname') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>
            <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/login" class="ms-1">Already have an account?</a>
        <?php Form::end()?>
    </div>
</div>
