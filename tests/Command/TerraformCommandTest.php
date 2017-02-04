<?php

namespace Tests\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Vehsamrak\Terraformator\Command\TerraformCommand;
use Vehsamrak\Terraformator\LocationGenerator\BiomQualifier;
use Vehsamrak\Terraformator\LocationGenerator\LocationGenerator;
use Vehsamrak\Terraformator\Service\MapTransformer;
use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class TerraformCommandTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function execute_commandWithoutInput_mapOutput(): void
    {
        $command = $this->createCommand();
        $commandTester = new CommandTester($command);

        $commandTester->execute(['command' => $command->getName()]);
        $output = $commandTester->getDisplay();

        // map of certain width delimited with end of line
        $mapWidth = 60;
        $this->assertRegExp(
            sprintf(
                '/.{%d}%s.{%d}%s.{%d}%s.*/',
                $mapWidth, PHP_EOL,
                $mapWidth, PHP_EOL,
                $mapWidth, PHP_EOL
            ),
            $output
        );
    }

    /** @test */
    public function execute_CommandWithoutInputExecutedTwoTimes_resultsAreNotEqual(): void
    {
        $command = $this->createCommand();
        $commandTester = new CommandTester($command);

        $commandTester->execute(['command' => $command->getName()]);
        $firstOutput = $commandTester->getDisplay();
        $commandTester->execute(['command' => $command->getName()]);
        $secondOutput = $commandTester->getDisplay();

        $this->assertNotEquals($firstOutput, $secondOutput);
    }

    private function createCommand(): Command
    {
        $application = new Application();
        $randomGenerator = new RandomGenerator();
        $biomQualifier = new BiomQualifier($randomGenerator);
        $locationGenerator = new LocationGenerator($biomQualifier);
        $mapTransformer = new MapTransformer();
        $application->add(new TerraformCommand($locationGenerator, $mapTransformer));
        $command = $application->find('create');

        return $command;
    }
}
