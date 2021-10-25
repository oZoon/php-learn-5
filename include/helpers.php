<?php
function scanDirectory()
{
    $scannedDir = array_diff(scandir(IMG_DIR), array('..', '.'));
    natcasesort($scannedDir);
    return array_merge($scannedDir);
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
