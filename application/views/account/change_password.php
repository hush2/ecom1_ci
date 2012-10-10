<?php if($this->session->flashdata('success')): ?>

    <h3>Your password has been changed.</h3>

<?php else: ?>

    <h3>Change Your Password</h3>
    <p>Use the form below to change your password.</p>

    <?= form_open('change_password') ?>
        <p>
        <?= form_label('Current Password', 'current_password') ?><br />
        <?= create_form_input('current_password', 'password') ?>
        </p>
        <p>
        <?= form_label('New Password', 'new_password') ?><br />
        <?= create_form_input('new_password', 'password') ?>
        <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small>
        </p>
        <p>
        <?= form_label('Confirm Password', 'confirm_password') ?><br />
        <?= create_form_input('confirm_password', 'password') ?>
        </p>
        <input type="submit" name="submit" value="Change &rarr;" id="submit_button" class="formbutton" />
    <?= form_close() ?>

<? endif ?>
