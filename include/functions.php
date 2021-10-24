<?php
// ****************************************************************************
// обработка полученного списка удаляемых файлов
// ****************************************************************************
// if (isset($_POST['deleteFiles'])) {
//     var_dump($_POST);
//     // $result = array_intersect(array_merge($_POST['del']), scanDirectory());
//     // for ($i = 0; $i < count($result); $i++) {
//     //     unlink(IMG_DIR . $result[$i]);
//     // }
//     // echo json_encode($result);
//     // exit;
// }

// ****************************************************************************
// роутинг страниц
// ****************************************************************************
function getQueryString()
{
    return substr(urldecode($_SERVER['REQUEST_URI']), 0, 8) == '/uploads' ? 'uploads' : 'manages';
}

// ****************************************************************************
// публикация размера файла
// ****************************************************************************
// function showSize($fileName)
// {
//     $result = '';
//     $size = filesize(IMG_DIR . $fileName);
//     // 4 693 b (x < 10 000)
//     // 4.693 Kb (10 000 < x < 1 000 000)
//     // 4.693 Mb (1 000 000 < x < 5 000 000)
//     if ($size < 10000) {
//         $result = number_format($size, 0, '', ' ') . ' b';
//     }
//     if ($size < 1000000) {
//         $result = number_format($size / 1000, 3, '.', '') . ' Kb';
//     }
//     if ($size < 2000000) {
//         $result = number_format($size / 1000000, 3, '.', '') . ' Mb';
//     }
//     return $result;
// }

// ****************************************************************************
// список закачанных файлов
// ****************************************************************************
// function scanDirectory()
// {
//     $scannedDir = array_diff(scandir(IMG_DIR), array('..', '.'));
//     natcasesort($scannedDir);
//     return $scannedDir;
// }
