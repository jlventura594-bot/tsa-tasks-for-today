<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>User Profile</h1>

<div class="card">
    <div class="card-body">

        <h3><?= $user['full_name'] ?></h3>

        <p>
            <strong>Username:</strong>
            <?= $user['username'] ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?= $user['email'] ?>
        </p>

        <p>
            <strong>Registered On:</strong>
            <?= date('F d, Y', strtotime($user['created_at'])) ?>
        </p>

    </div>
</div>

<?= $this->endSection() ?>