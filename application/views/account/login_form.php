<div class="title">
	<h4>Login</h4>
</div>

<?= form_open('login') ?>
    <p>
    <?php if (isset($failed)): ?>
        <span class='error'>The email address and password do not match those on file.</span><br/>
    <? endif ?>

    <label for="email"><strong>Email Address</strong></label><br />
    <?= create_form_input('login_email') ?><br />

    <label for="password"><strong>Password</strong></label><br />
    <?= create_form_input('login_password', 'password') ?>

    <a href="forgot_password" align="right">Forgot?</a><br />

    <input id='submit' name="submit" type="submit" value="Login &rarr;">
    </p>
<?= form_close() ?>
