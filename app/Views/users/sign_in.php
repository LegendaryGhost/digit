<?php if($error_message != ''): ?>
<div class="alert alert-danger"><?= $error_message ?></div>
<?php endif; ?>

<form action="#" method="post">
    <?= $form->input('username', 'Pseudo') ?>
    <?= $form->input('email', 'Adresse E-mail', ['type' => 'email']) ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']) ?>
    <?= $form->input('password2', 'Confirmer votre mot de passe', ['type' => 'password']) ?>
    <?= $form->submit('Inscription') ?>
</form>
<a href="?page=users.login">Vous êtes déjà inscrit ?</a>