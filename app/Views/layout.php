<!DOCTYPE html>
<html>

<head>
    <title>TSA1 - Tasks For Today</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="/welcome">Task Management System</a>

            <div class="navbar-nav">
                <a class="nav-link" href="/welcome">Home</a>
                <a class="nav-link" href="/tasks">Task List</a>
                <a class="nav-link" href="/profile">Profile</a>
                <a class="nav-link" href="/about">About</a>
            </div>

        </div>
        <?php if (session()->get('logged_in')): ?>
            <form action="<?= site_url('logout') ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit">Logout</button>
            </form>
        <?php else: ?>
            <a href="<?= site_url('login') ?>">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container mt-4">

        <?= $this->renderSection('content') ?>

    </div>

</body>

</html>