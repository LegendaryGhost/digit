<?php if($errors): ?>
    <div class="alert alert-danger">Identifiants incorrects</div>
<?php endif; ?>

<form action="#" method="post">
    <?= $form->input('email', 'Adresse E-mail', ['type' => 'email']) ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']) ?>
    <?= $form->submit('Connexion') ?>
</form>
<a href="?page=users.sign_in">Vous n'êtes pas encore inscrit ?</a>