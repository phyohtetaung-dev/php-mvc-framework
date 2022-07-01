<?php
/** @var $this \app\core\View */
/** @var $this \app\models\ContactForm */

use app\core\form\Form;
use app\core\form\TextareaField;

$this->title = 'Contact';
?>

<div class="card">
    <div class="card-header bg-black text-white">Contact Us</div>
    <div class="card-body">
        <?php $form = Form::begin('', 'post')?>
            <?php echo $form->field($model, 'subject') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo new TextareaField($model, 'body') ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        <?php Form::end()?>
    </div>
</div>
