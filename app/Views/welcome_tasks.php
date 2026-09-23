<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Today's Tasks</h1>

<table class="table table-bordered">

    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php foreach ($tasks as $task): ?>

        <tr>
            <td><?= $task['title'] ?></td>
            <td><?= $task['status'] ?></td>
            <td><?= $task['task_date'] ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<?= $this->endSection() ?>