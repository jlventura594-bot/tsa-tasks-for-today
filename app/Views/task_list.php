<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>All Tasks</h1>

<table class="table table-striped">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php foreach ($tasks as $task): ?>

        <tr>
            <td><?= $task['id'] ?></td>
            <td><?= $task['title'] ?></td>
            <td><?= $task['status'] ?></td>
            <td><?= $task['task_date'] ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<?= $this->endSection() ?>