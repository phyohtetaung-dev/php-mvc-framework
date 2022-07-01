<?php
/** @var $this \app\core\View */
$this->title = 'Contact';
?>

<div class="card">
    <div class="card-header bg-black text-white">Contact Us</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3 row">
                <label>Subject</label>
                <div>
                    <input type="text" name="subject" class="form-control">
                </div>
            </div>
            <div class="mb-3 row">
                <label>Email</label>
                <div>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="mb-3 row">
                <label>Body</label>
                <div>
                    <textarea name="body" class="form-control"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
