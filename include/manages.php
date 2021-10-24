<?php
function scanDirectory()
{
    $scannedDir = array_diff(scandir(IMG_DIR), array('..', '.'));
    natcasesort($scannedDir);
    return array_merge($scannedDir);
}

$imageDirectoryContent = scanDirectory();
if (isset($_POST['deleteFiles'])) {
    // var_dump($_POST['deleteFiles']);
    $result = array_intersect($_POST['deleteFiles'], $imageDirectoryContent);
    if (in_array('all', $_POST['deleteFiles'])) {
        $result = $imageDirectoryContent;
    }
    // echo '<plaintext>';
    // var_dump($result);
    for ($i = 0; $i < count($result); $i++) {
        echo $i . ': ' . $result[$i] . '<br />';
        // var_dump(IMG_DIR . $result[$i]);
        // unlink(IMG_DIR . $result[$i]);
    }
}


function showSize($fileName)
{
    $result = '';
    $size = filesize(IMG_DIR . $fileName);
    if ($size < 10000) {
        $result = number_format($size, 0, '', ' ') . ' b';
    }
    if ($size < 1000000) {
        $result = number_format($size / 1000, 3, '.', '') . ' Kb';
    }
    if ($size < 2000000) {
        $result = number_format($size / 1000000, 3, '.', '') . ' Mb';
    }
    return $result;
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
        <span>удалить все <input type="checkbox" value="all" name="deleteFiles[]" /></span>
        <input type="submit" value="удалить" />
    </div>
</form>' :
'';
