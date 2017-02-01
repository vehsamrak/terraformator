<?php

namespace Vehsamrak\Terraformator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\LocationGenerator\LocationGenerator;
use Vehsamrak\Terraformator\Service\MapTransformer;

/**
 * @author Vehsamrak
 */
class TerraformCommand extends Command
{

    private const MAP_WIDTH = 60;
    private const MAP_HEIGHT = 30;

    /** @var LocationGenerator $locationGenerator */
    private $locationGenerator;
    /** @var MapTransformer $mapTransformer */
    private $mapTransformer;

    /** {@inheritDoc} */
    public function __construct(
        $name = null,
        LocationGenerator $locationGenerator = null,
        MapTransformer $mapTransformer = null
    ) {
        $this->mapTransformer = $mapTransformer ?? new MapTransformer();
        $this->locationGenerator = $locationGenerator ?? new LocationGenerator();
        parent::__construct($name = null);
    }

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
        $map = new Map();

        for ($y = 1; $y <= self::MAP_HEIGHT; $y++) {
            for ($x = 1; $x <= self::MAP_WIDTH; $x++) {
                $location = $this->locationGenerator->generateLocation($map, $x, $y);
                $map->add($location);
            }
        }

        $stringMap = $this->mapTransformer->convertToString($map, self::MAP_WIDTH);

        $output->writeln($stringMap);
    }
}
