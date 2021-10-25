<?php
$imageDirectoryContent = scanDirectory();
if (isset($_POST['deleteFiles'])) {
    $result = array_intersect($_POST['deleteFiles'], $imageDirectoryContent);
    if (in_array('all', $_POST['deleteFiles'])) {
        $result = $imageDirectoryContent;
    }
    for ($i = 0; $i < count($result); $i++) {
        unlink(IMG_DIR . $result[$i]);
    }
}

$imageDirectoryContent = scanDirectory();
echo (count($imageDirectoryContent) >= 1) ?
    '<form action="/" method="POST" class="form-list">' :
    'нет изображений';
?>
<ul class="image-list">
    <?php
        foreach ($imageDirectoryContent as $key => $value) {
            ?>
    <li class="image-card">
        <a href="/manages/<?= urlencode($value) ?>"
            class="link-image">
            <img src="/upload/<?= $value ?>" width="100"
                height="100">
            <div class="desc">
                <span class="filename">Имя: <?= $value ?></span>
                <span>Размер: <?= showSize($value) ?></span>
                <span>Дата: <?= date('d.m.Y H:i', filectime(IMG_DIR . $value)) ?></span>
                <span>удалить <input type="checkbox" name="deleteFiles[]"
                        value="<?= $value ?>" /></span>
            </div>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
<?php
echo (count($imageDirectoryContent) >= 1) ?
'   <div class="submit-manage">
        <div style="width: 110px;">удалить все <input type="checkbox" value="all" name="deleteFiles[]" /></div>
        <input type="submit" value="удалить" style="width: 110px; margin-top: 12px;" />
    </div>
</form>' :
'';
$fileShow = explode('/', urldecode($_SERVER['REQUEST_URI']));
if (isset($fileShow[2]) && mb_strlen($fileShow[2]) > 1 && is_file(IMG_DIR . $fileShow[2])) {
    list($width, $height, $type, $attr) = getimagesize(IMG_DIR . $fileShow[2]); ?>
<div style="display: flex; justify-content: center; margin-top: 24px;">
    <img src="/upload/<?= $fileShow[2] ?>" <?= $attr ?>>
</div>
    <?php
}
