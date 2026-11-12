<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <div class="container">
        <h1><?= $quemsou['Titulo'] ?? ''; ?></h1>
        <h2><?= $quemsou['Text'] ?? ''; ?></h2>
    </div>
<?= $this->endSection() ?>