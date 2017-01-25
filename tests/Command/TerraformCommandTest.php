<?php

namespace Tests\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Vehsamrak\Terraformator\Command\TerraformCommand;

/**
 * @author Vehsamrak
 */
class TerraformCommandTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function execute_commandWithoutInput_stringOutput()
    {
        $application = new Application();
        $application->add(new TerraformCommand());
        $command = $application->find('create');
        $commandTester = new CommandTester($command);
        $commandTester->execute(['command' => $command->getName()]);
        $output = $commandTester->getDisplay();

        // map of certain width
        $mapWidth = 10;
        $this->assertRegExp(
            sprintf(
                '/.{%d}%s.{%d}%s.{%d}%s.{%d}%s.{%d}%s/',
                $mapWidth, PHP_EOL,
                $mapWidth, PHP_EOL,
                $mapWidth, PHP_EOL,
                $mapWidth, PHP_EOL,
                $mapWidth, PHP_EOL

            ),
            $output
        );
    }
}
