<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <div class="container">
        <h1><?= $contato['Titulo'] ?? ''; ?></h1>
        <h2><?= $contato['Text'] ?? ''; ?></h2>
    </div>
<?= $this->endSection() ?>