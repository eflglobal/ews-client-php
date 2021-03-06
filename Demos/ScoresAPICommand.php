<?php
require_once 'vendor/autoload.php';

if (!isset($argv[2])) {
    $file = fopen($argv[1], 'r');
    $file = fread($file, 10485760);
    $arguments = explode(PHP_EOL, $file);

    $test = new \EFLGlobal\EWSClient\ScoresAPIController($arguments[0], $arguments[1], $arguments[2], $arguments[3]);
}
else {
    $test = new \EFLGlobal\EWSClient\ScoresAPIController($argv[1], $argv[2], $argv[3], $argv[4]);
}

echo $test->callLogin();

$data = [
    [
        "identification"=> [
            [
                "type"=> "nationalId",
                "value"=> "DZ-015"
            ]
        ]
    ]
];

echo $test->callSubject($data);
