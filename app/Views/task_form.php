<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?php $isEditing = !empty($task['id']); ?>

<h1><?= $isEditing ? 'Edit Task' : 'New Task' ?></h1>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= $isEditing
    ? site_url('tasks/update/' . $task['id'])
    : site_url('tasks/create') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="title" class="form-label">Task title</label>
        <input type="text" id="title" name="title" class="form-control" maxlength="150"
            value="<?= old('title', $task['title'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
        <label for="task_date" class="form-label">Task date</label>
        <input type="date" id="task_date" name="task_date" class="form-control"
            value="<?= old('task_date', $task['task_date'] ?? '') ?>" required>
    </div>

    <?php if ($isEditing): ?>
        <?php $selectedStatus = old('status', $task['status'] ?? 'pending'); ?>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="pending" <?= $selectedStatus === 'pending' ? 'selected' : '' ?>>
                    Pending
                </option>
                <option value="completed" <?= $selectedStatus === 'completed' ? 'selected' : '' ?>>
                    Completed
                </option>
            </select>
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">
        <?= $isEditing ? 'Save Changes' : 'Create Task' ?>
    </button>
</form>

<?= $this->endSection() ?>