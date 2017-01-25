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
        $output->writeln('map created');
    }
}
