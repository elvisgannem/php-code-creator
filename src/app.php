#!/usr/bin/php
<?php

require 'vendor/autoload.php';

use PhpCodeCreator\classes\ClassGenerator;
use PhpCodeCreator\classes\FileGenerator;
use PhpCodeCreator\classes\HelpGenerator;

if($argc === 1 || $argv[1] === '--help') {
    HelpGenerator::createWelcomeMessage();
    HelpGenerator::createDescription();
} else {
    if($argv[1] === '--create') {
        if(isset($argv[2]) && $argv[2] === '--file' && isset($argv[4])) {
            FileGenerator::createFile($argv[3], $argv[4]);
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
            HelpGenerator::createDescription();
        }
    }
}
