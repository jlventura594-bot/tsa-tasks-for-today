<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>All Tasks</h1>
<?php if (session()->get('logged_in')): ?>
    <a href="<?= site_url('tasks/new') ?>" class="btn btn-success mb-3">
        Add New Task
    </a>
<?php endif; ?>

<?php if ($success = session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc($success) ?></div>
<?php endif; ?>

<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($tasks)): ?>
            <tr>
                <td colspan="5">No tasks found.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                    <td>
                        <?php if (session()->get('logged_in')): ?>
                            <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="<?= site_url('tasks/archive/' . $task['id']) ?>" method="post" class="d-inline"
                                onsubmit="return confirm('Archive this task?')">
                                <?= csrf_field() ?>

                                <button type="submit" class="btn btn-sm btn-danger">
                                    Archive
                                </button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>