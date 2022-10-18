<?php
namespace Nicksxs\PhpRename;

use Exception;

class Rename
{
    public static function renameSingleNormalFile($file, $newFileName): bool
    {
        if(!is_file($file)) {
            echo "it's not a file";
            return false;
        }
        $fileInfo = pathinfo($file);
        return rename($file, $fileInfo["dirname"] . DIRECTORY_SEPARATOR . $newFileName . "." . $fileInfo["extension"]);
    }

    public static function renameSingleDotFile($file, $newFileName): bool
    {
        if (!is_file($file)) {
            return false;
        }
        $fileInfo = pathinfo($file);
        if ($fileInfo["filename"] != "") {
            throw new Exception("file type do not support", 1);
        }
        return rename($file, $fileInfo["dirname"] . DIRECTORY_SEPARATOR . "." . $newFileName);
    }
}



