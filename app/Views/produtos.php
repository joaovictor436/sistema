<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <div class="container">
        <h1><?= $produtos['Titulo'] ?? ''; ?></h1>
        <h2><?= $produtos['Text'] ?? ''; ?></h2>
    </div>
<?= $this->endSection() ?>