<?php

// require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Nicksxs\PhpRename\Rename;
use function PHPUnit\Framework\assertEquals;

class RenameTest extends TestCase
{
    public function setUp(): void
    {
        $myfile = fopen(__DIR__ . DIRECTORY_SEPARATOR . "oldfile.txt", "w") or die("Unable to open file!");
        $txt = "file test1\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        $myfile = fopen(__DIR__ . DIRECTORY_SEPARATOR . ".old", "w") or die("Unable to open file!");
        $txt = "new test1\n";
        fwrite($myfile, $txt);
        fclose($myfile);

    }

    public function testRename()
    {
        Rename::renameSingleNormalFile(__DIR__ . DIRECTORY_SEPARATOR . "oldfile.txt", "newfile");
        assertEquals(is_file(__DIR__ . DIRECTORY_SEPARATOR . "newfile.txt"), true);
        Rename::renameSingleDotFile(__DIR__ . DIRECTORY_SEPARATOR . ".old", "new");
        assertEquals(is_file(__DIR__ . DIRECTORY_SEPARATOR . ".new"), true);
    }

    protected function tearDown(): void
    {
        unlink(__DIR__ . DIRECTORY_SEPARATOR . "newfile.txt");
        unlink(__DIR__ . DIRECTORY_SEPARATOR . ".new");
    }
}
