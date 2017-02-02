<?php

namespace Tests\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Vehsamrak\Terraformator\Command\TerraformCommand;

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
        $application->add(new TerraformCommand());
        $command = $application->find('create');

        return $command;
    }
}
