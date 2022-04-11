#!/usr/bin/php
<?php

require './src/classes/ClassGenerator.php';

function createDescription(): void
{
    echo PHP_EOL . "--create [ARGUMENTS]:" . PHP_EOL;
    echo "      --file [PATH] [NAME] (Creates a file with .php extension)" . PHP_EOL;
    echo "      --class [PATH] [NAME](Creates a PHP class)" . PHP_EOL;
    echo "          --attr:one,two,three (Creates private attributes - optional)";
}

function createFile(string $path, string $filename): void
{
    if(!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    file_put_contents("$path/$filename.php", '<?php');
}

if($argc === 1 || $argv[1] === '--help') {
    echo PHP_EOL . "\e[0;32mWelcome to PHP code creator command line helper.\e[0m" . PHP_EOL;
    echo "If you have any problem or suggestion, please, be free to write an email: egannem@gmail.com" . PHP_EOL;
    echo PHP_EOL . "\e[0;32mCommand that you can use: \e[0m" . PHP_EOL;
    createDescription();
} else {
    if($argv[1] === '--create') {
        if(isset($argv[2]) && $argv[2] === '--file' && isset($argv[4])) {
            createFile($argv[3], $argv[4]);
            echo PHP_EOL . "\e[0;32mFile $argv[4].php created\e[0m" . PHP_EOL;
        } else if(isset($argv[2]) && $argv[2] === '--class' && isset($argv[4])) {

            if(isset($argv[5])) {
                $attributes = explode(':', $argv[5]);
                $attributes = explode(',', $attributes[1]);
                ClassGenerator::createFile($argv[3], $argv[4], ClassGenerator::createAttributes($attributes));
            } else {
                ClassGenerator::createFile($argv[3], $argv[4], null);
            }

            echo PHP_EOL . "\e[0;32mClass $argv[4].php created\e[0m" . PHP_EOL;

        } else {
            createDescription();
        }
    }
}
