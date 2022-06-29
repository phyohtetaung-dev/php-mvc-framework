<div class="card">
    <div class="card-header bg-black text-white">Create an account</div>
    <div class="card-body">
        <?php $form = app\core\form\Form::begin('', 'post')?>
            <?php echo $form->field($model, 'firstname') ?>
            <?php echo $form->field($model, 'lastname') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>
            <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        <?php app\core\form\Form::end()?>
    </div>
</div>
