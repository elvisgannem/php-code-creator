<?php

namespace PhpCodeCreator\classes;

class FileGenerator
{
    public static function createFile(string $path, string $filename): void
    {
        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents("$path/$filename.php", '<?php');
    }
}
