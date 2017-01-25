<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new Symfony\Component\Console\Application();
$application->add(new Vehsamrak\Terraformator\Command\TerraformCommand());
$application->run();
