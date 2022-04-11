<?php

namespace PhpCodeCreator\classes;

class ClassGenerator
{
    public static function createFile(string $path, string $filename, string|null $attributes): void
    {
        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents("$path/$filename.php", self::classContent($filename, $attributes));
    }

    private static function classContent(string $className, string|null $attributes): string
    {
        return "<?php" . PHP_EOL . "class $className " . PHP_EOL . "{
    " . PHP_EOL . $attributes . "
    public function __construct()
    {
        //CONSTRUCT CONTENT
    } " . PHP_EOL . "}";
    }

    public static function createAttributes(array $attributes): string
    {
        $attrs = '';
        foreach($attributes as $attribute) {
            $attrs .= "     private $$attribute;" . PHP_EOL;
        }
        return $attrs;
    }
}
