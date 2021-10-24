<?php
$messageResult = [];

if (isset($_FILES['userfile'])) {
    $files = &$_FILES['userfile'];

    // результат: загружено больше 5 файлов
    if (count($files['name']) > 5) {
        $messageResult[0] = UPLOAD_ERROR[10];
    }

    // результат: не загружено ни одного файла
    $checkFirstFile = false;
    if (
        count($files['name']) == 1 &&
        $files['name'][0] == '' &&
        $files['type'][0] == '' &&
        $files['tmp_name'][0] == '' &&
        $files['error'][0] == UPLOAD_ERR_NO_FILE &&
        $files['size'][0] == 0
        ) {
        $checkFirstFile = true;
        $messageResult[0] = UPLOAD_ERROR[9];
    }

    // остальные случаи загрузки файлов
    if (count($files['name']) <= 5 && !$checkFirstFile) {
        foreach ($files['error'] as $key => &$error) {
            $fileExtension = pathinfo(basename($files['name'][$key]), PATHINFO_EXTENSION);
            $fileMime = substr($files['type'][$key], 6);

            // результат: соответствующая ошибка загрузки файла
            $messageResult[$key] = $files['name'][$key] . ': ' . UPLOAD_ERROR[$error];

            if (
                $error == UPLOAD_ERR_OK &&
                in_array($fileExtension, ALLOW_EXTENSIONS) &&
                in_array($fileMime, ALLOW_EXTENSIONS)
                ) {
                $fileName = IMG_DIR . $files['name'][$key];

                // результат: ошибка перемещения файла
                $messageResult[$key] = $files['name'][$key] . ': ' . UPLOAD_ERROR[11];

                if (move_uploaded_file($files['tmp_name'][$key], $fileName)) {
                    // результат: успешная загрузка файла
                    $messageResult[$key] = $files['name'][$key] . ': ' . UPLOAD_ERROR[$error];
                }
            }
        }
    }
}
$allowExtension = [];
foreach (ALLOW_EXTENSIONS as $key => &$value) {
    $allowExtension[$key] = '.' . $value;
}
?>
<form enctype="multipart/form-data" action="/uploads" method="POST" class="form-upload">
    <input type="hidden" name="MAX_FILE_SIZE"
        value="<?= LIMIT_FILE_SIZE ?>" />
    <input name="userfile[]" type="file" multiple
        accept="<?= implode(', ', $allowExtension) ?>" />
    <input type="submit" value="Отправить" class="submit-upload" />
</form>
<?php
foreach ($messageResult as &$value) {
    echo "<div>$value</div>";
}
