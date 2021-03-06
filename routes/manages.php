<?php
$imageDirectoryContent = scanDirectory();
if (isset($_POST['deleteFiles']) && $isLogged) {
    $result = array_intersect($_POST['deleteFiles'], $imageDirectoryContent);
    if (in_array('all', $_POST['deleteFiles'])) {
        $result = $imageDirectoryContent;
    }
    for ($i = 0; $i < count($result); $i++) {
        unlink(IMG_DIR . $result[$i]);
    }
}

$imageDirectoryContent = scanDirectory();
if (count($imageDirectoryContent) >= 1) {
?>
    <form action="/" method="POST" class="form-list">
        <ul class="image-list">
            <?php
            foreach ($imageDirectoryContent as $key => $value) {
            ?>
                <li class="image-card">
                    <?php if ($isLogged) { ?>
                        <a href="/manages?file=<?= urlencode($value) ?>" class="link-image">
                        <?php } ?>
                        <img src="/upload/<?= $value ?>" width="100" height="100">
                        <div class="desc">
                            <span class="filename">Имя: <?= $value ?></span>
                            <span>Размер: <?= showSize($value) ?></span>
                            <span>Дата: <?= date('d.m.Y H:i', filectime(IMG_DIR . $value)) ?></span>
                            <?php
                            if ($isLogged) { ?>
                                <span>удалить <input type="checkbox" name="deleteFiles[]" value="<?= $value ?>" /></span>
                            <?php
                            }
                            ?>
                        </div>
                        <?php if ($isLogged) { ?>
                        </a>
                    <?php } ?>
                </li>
            <?php
            } ?>
        </ul>
        <?php
        if ($isLogged) { ?>
            <div class="submit-manage">
                <div style="width: 110px;">удалить все <input type="checkbox" value="all" name="deleteFiles[]" /></div>
                <input type="submit" value="удалить" style="width: 110px; margin-top: 12px;" />
            </div>
        <?php
        }
        ?>
    </form>
    <?php
    if (isset($_GET['file']) && mb_strlen($_GET['file']) > 1 && is_file(IMG_DIR . $_GET['file']) && $isLogged) {
        list($width, $height, $type, $attr) = getimagesize(IMG_DIR . $_GET['file']); ?>
        <div style="display: flex; justify-content: center; margin-top: 24px;">
            <img src="/upload/<?= $_GET['file'] ?>" <?= $attr ?>>
        </div>
    <?php
    }
} else {
    ?>
    нет изображений
<?php
}
