<?php

namespace PhpCodeCreator\classes;

class HelpGenerator
{
    public static function createWelcomeMessage(): void
    {
        echo PHP_EOL . "\e[0;32mWelcome to PHP code creator command line helper.\e[0m" . PHP_EOL;
        echo "If you have any problem or suggestion, please, be free to write an email: egannem@gmail.com" . PHP_EOL;
        echo PHP_EOL . "\e[0;32mCommand that you can use: \e[0m" . PHP_EOL;
    }

    public static function createDescription(): void
    {
        echo PHP_EOL . "--create [ARGUMENTS]:" . PHP_EOL;
        echo "      --file [PATH] [NAME] (Creates a file with .php extension)" . PHP_EOL;
        echo "      --class [PATH] [NAME](Creates a PHP class)" . PHP_EOL;
        echo "          --attr:one,two,three (Creates private attributes - optional)";
    }
}
