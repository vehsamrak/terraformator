<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Vehsamrak\Terraformator\Command\TerraformCommand;
use Vehsamrak\Terraformator\LocationGenerator\BiomQualifier;
use Vehsamrak\Terraformator\LocationGenerator\LocationGenerator;
use Vehsamrak\Terraformator\Service\MapTransformer;
use Vehsamrak\Terraformator\Service\RandomGenerator;

$container = new ContainerBuilder();
$container->register('random_generator', RandomGenerator::class);
$container->register('map_transformer', MapTransformer::class);
$container->register('biom_qualifier', BiomQualifier::class)
    ->addArgument(new Reference('random_generator'));
$container->register('location_generator', LocationGenerator::class)
    ->addArgument(new Reference('biom_qualifier'));

$application = new Application();
$application->add(new TerraformCommand($container->get('location_generator'), $container->get('map_transformer')));
$application->run();
