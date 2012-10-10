<?= doctype('xhtml1-trans') ?>

<head>
    <?= meta('Content-Type', 'text/html; charset=utf-8', 'equiv') ?>
    <title><?= $this->page_title ?: 'Knowledge is Power: And It Pays to Know' ?></title>
    <?= link_tag('css/styles.css') ?>
</head>

<body>

<div id="wrap">

    <div class="header">
        <?= heading(anchor(base_url(), 'Knowledge is Power'), 1) ?>
        <?= heading('and it pays to know', 2) ?>
    </div>

    <div id="nav">
        <ul>
            <li <?= set_selected('') ?>><a href="<?= base_url() ?>"><span>Home</span></a></li>
            <li <?= set_selected('about') ?>><a href="<?= base_url('about') ?>"><span>About</span></a></li>
            <li <?= set_selected('contact') ?>><a href="<?= base_url('contact') ?>"><span>Contact</span></a></li>
            <?php if ( ! $this->session->userdata('id')): ?>
            <li <?= set_selected('register') ?>><a href="<?= base_url('register') ?>"><span>Register</span></a></li>
            <?php endif ?>
        </ul>
    </div>
    <div class="page">
        <div class="content">

        <?= $content ?>

        <p><br clear="all" /></p>
        </div>

        <div class="sidebar">

        <?php if ($this->session->userdata('id')): ?>
        <div class="title">
            <h4>Manage Your Account</h4>
        </div>
        <ul>
            <li><?= anchor('renew', 'Renew Account') ?></li>
            <li><?= anchor('change_password', 'Change Password') ?></li>
            <li><?= anchor('favorites', 'Favorites') ?></li>
            <li><?= anchor('history', 'History') ?></li>
            <li><?= anchor('logout', 'Logout') ?></li>
        </ul>

        <?php if ($this->session->userdata('type') == 'admin'): ?>
            <div class="title">
                <h4>Administration</h4>
            </div>
            <ul>
                <li><?= anchor('add_page', 'Add Page') ?></li>
                <li><?= anchor('add_pdf', 'Add PDF') ?></li>
            </ul>
            <? endif ?>
            <? else: ?>
                <?php include 'account/login_form.php' ?>
        <? endif ?>

        <div class="title">
            <h4>Content</h4>
        </div>
        <ul>
        <?php foreach ($categories as $category): ?>
            <li><?= anchor("category/$category->id", $category->category); ?></li>
        <?php endforeach ?>
            <li><?= anchor('pdfs', 'PDF Guides') ?></li>
        </ul>

        </div>

        <div class="footer">
        <p><a href="#" title="Site Map">Site Map</a> | <a href="#" title="Site Policies">Policies</a> &nbsp;&nbsp; &copy; Knowledge is Power | Design by <a href="http://www.spyka.net">spyka webmaster</a></p> 
        </div>

    </div>

</div>
</body>
</html>
