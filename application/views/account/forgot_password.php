<?php if ($this->session->flashdata('success')): ?>

    <h3>Your password has been changed.</h3>
    <p>You will receive the new, temporary password via email. Once you have logged in with this new password, you may change it by clicking on the "Change Password" link.</p>

<?php else: ?>

    <h3>Reset Your Password</h3>
    <p>Enter your email address below to reset your password.</p>

    <?= form_open('forgot_password') ?>

        <p><label for="email"><strong>Email Address</strong></label><br />
        <?= create_form_input('email'); ?>
        </p>
        <input type="submit" name="submit" value="Reset &rarr;" id="submit_button" class="formbutton" />

    <?= form_close() ?>

<?php endif ?>

