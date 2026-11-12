<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <div class="container">
        <h1><?= $conteudo['Titulo'] ?? ''; ?></h1>
        <h2><?= $conteudo['Text'] ?? ''; ?></h2>
    </div>
<?= $this->endSection() ?>