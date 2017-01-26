<?php

namespace Vehsamrak\Terraformator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Vehsamrak
 */
class TerraformCommand extends Command
{

    private const MAP_WIDTH = 60;
    private const MAP_HEIGHT = 30;

    /** {@inheritDoc} */
    protected function configure()
    {
        $this->setName('create');
        $this->setDescription('Create new map');
        $this->setHelp('This command allows you to create game map.');;
    }

    /** {@inheritDoc} */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $map = '';

        for ($y = 1; $y <= self::MAP_HEIGHT; $y++) {
            for ($x = 1; $x <= self::MAP_WIDTH; $x++) {
                $mapTypes = ['#', '_', '.', '^'];
                $mapType = array_rand($mapTypes);
                $map .= $mapTypes[$mapType];
            }

            $map .= PHP_EOL;
        }

        unset($x, $y);

        $output->writeln($map);
    }
}
