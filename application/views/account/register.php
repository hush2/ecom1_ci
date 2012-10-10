<?if ($this->session->flashdata('success')): ?>

    <h3>Thanks!</h3>
    <p>Thank you for registering! To complete the process, please now click the button below so that you may pay for your site access via PayPal. The cost is $10 (US) per year.</p>

<? else: ?>

    <h3>Register</h3>
    <p>Access to the site's content is available to registered users at a cost of $10.00 (US) per year. Use the form below to begin the registration process. <strong>Note: All fields are required.</strong> After completing this form, you'll be presented with the opportunity to securely pay for your yearly subscription via <a href="http://www.paypal.com">PayPal</a>.</p>

    <?= form_open('register', array('style' => 'padding-left:100px')); ?>

        <p><?= form_label('First Name', 'first_name') ?><br />
        <?= create_form_input('first_name') ?></p>

        <p><?= form_label('Last Name', 'last_name') ?><br />
        <?= create_form_input('last_name'); ?></p>

        <p><?= form_label('Desired Username', 'username') ?><br />
        <?= create_form_input('username'); ?>
        <small>Only letters and numbers are allowed.</small></p>

        <p><?= form_label('Email Address', 'email') ?><br />
        <?= create_form_input('email'); ?></p>

        <p><?= form_label('Password', 'password') ?><br />
        <?= create_form_input('password', 'password'); ?>
        <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small></p>

        <p><?= form_label('Confirm Password', 'confirm_password') ?><br />
        <?= create_form_input('confirm_password', 'password'); ?></p>

        <input type="submit" name="submit" value="Next &rarr;" class="formbutton" />

    <?= form_close() ?>

<? endif ?>