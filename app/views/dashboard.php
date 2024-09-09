<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Cloud File Manager</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Cloud File Manager</h1>
        <nav>
            <a href="<?= BASE_URL ?>/index.php?route=logout">Logout</a>
        </nav>
    </header>

    <main>
        <section class="breadcrumb">
            <a href="<?= BASE_URL ?>/index.php?route=files">Home</a>
            <?php foreach ($currentPath as $folder): ?>
                / <a href="<?= BASE_URL ?>/index.php?route=files&parent_id=<?= $folder['id'] ?>"><?= htmlspecialchars($folder['name']) ?></a>
            <?php endforeach; ?>
        </section>

        <section class="actions">
            <form action="<?= BASE_URL ?>/index.php?route=create_directory" method="post" class="inline-form">
                <input type="text" name="directory_name" placeholder="New folder name" required>
                <input type="hidden" name="parent_id" value="<?= $parentId ?? '' ?>">
                <button type="submit">Create Folder</button>
            </form>

            <form action="<?= BASE_URL ?>/index.php?route=upload" method="post" enctype="multipart/form-data" class="inline-form">
                <input type="file" name="file" required>
                <input type="hidden" name="parent_id" value="<?= $parentId ?? '' ?>">
                <button type="submit">Upload File</button>
            </form>
        </section>

        <section class="file-list">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td>
                                <?php if ($file['is_directory']): ?>
                                    <a href="<?= BASE_URL ?>/index.php?route=files&parent_id=<?= $file['id'] ?>" class="folder"><?= htmlspecialchars($file['name']) ?></a>
                                <?php else: ?>
                                    <span class="file"><?= htmlspecialchars($file['name']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $file['is_directory'] ? 'Folder' : pathinfo($file['name'], PATHINFO_EXTENSION) ?></td>
                            <td><?= $file['is_directory'] ? '-' : $this->formatSize($file['size']) ?></td>
                            <td>
                                <?php if (!$file['is_directory']): ?>
                                    <a href="<?= BASE_URL ?>/index.php?route=download&id=<?= $file['id'] ?>" class="button">Download</a>
                                <?php endif; ?>
                                <a href="<?= BASE_URL ?>/index.php?route=delete&id=<?= $file['id'] ?>" class="button delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Glubul</p>
    </footer>
</body>
</html>