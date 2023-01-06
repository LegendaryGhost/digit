<form action="#" method="post" enctype="multipart/form-data">
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']) ?>
    <?= $form->input('image', 'Image', ['type' => 'file', 'required' => false]) ?>
    <?= $form->submit('Publier') ?>
</form>