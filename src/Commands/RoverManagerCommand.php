<?php

namespace NASA\Commands;

use NASA\Interfaces\{ Surface, VehicleManager };
use NASA\Parser\{ CommandParser, OrientationParser };
use NASA\Universe\{ Coordinate, Location, Surface\Mars };
use NASA\Vehicle\Rover;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\{ ConfirmationQuestion, Question };

/**
 * Class RoverManagerCommand
 *
 * @package NASA\Commands
 * @author Philippe Vanzin Moreira
 */
final class RoverManagerCommand extends Command
{
    /**
     * @var Surface
     */
    private $surface;

    /**
     * @var VehicleManager
     */
    private $manager;

    /**
     * Configure name, description and arguments of the command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setName('rover-manager')
            ->setDescription('Send instructions to NASA rovers on Mars')
            ->setHelp('');
    }

    /**
     * Execute the command itself
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        try {
            $helper = $this->getHelper('question');

            // Get the surface size
            $surfaceSize = $this->surfaceQuestion($helper, $input, $output);
            $surfaceCoordinates = new Coordinate($surfaceSize[0], $surfaceSize[1]);

            $this->surface = new Mars($surfaceCoordinates);
            $this->manager = new \NASA\RoverManager($this->surface);

            // Ask for rovers informations
            $this->askForRovers($helper, $input, $output);

            $this->manager->deploy();
            $locations = $this->manager->getVehiclesLocations();

            foreach ($locations as $location) {
                $output->writeln((string) $location);
            }
        } catch(\Exception $e) {
            $output->writeln('The command cannot be executed. Something is wrong, sorry.');
        }
    }

    private function surfaceQuestion($helper, $input, $output)
    {
        $surfaceSizeQuestion = new Question('Please provide in integer numbers the size of the surface separated by one space (e.g. 5 5): ', '');
        return explode(' ', $helper->ask($input, $output, $surfaceSizeQuestion));
    }

    /**
     * Ask for rovers
     *
     * @param $helper
     * @param $input
     * @param $output
     * @throws \NASA\Exceptions\InvalidCommandException
     * @throws \NASA\Exceptions\InvalidOrientationException
     */
    private function askForRovers($helper, $input, $output)
    {
        $rover = true;
        while ($rover) {
            $locationArray = $this->roverInformationQuestion($helper, $input, $output);

            $commands = $this->roverCommandsQuestion($helper, $input, $output);
            $location = new Location(new Coordinate($locationArray[0], $locationArray[1]), OrientationParser::fromString($locationArray[2]));
            $rover = new Rover($this->surface, $location, $commands);

            $this->manager->addVehicle($rover);

            // Check if user wants to provide more rovers
            $question = new ConfirmationQuestion('Have any another rover to provide? (yes|no) ', false);
            $rover = $helper->ask($input, $output, $question);
        }
    }

    /**
     * Ask the rover command string
     *
     * @param $helper
     * @param $input
     * @param $output
     * @return array
     * @throws \NASA\Exceptions\InvalidCommandException
     */
    private function roverCommandsQuestion($helper, $input, $output)
    {
        $commandsQuestion = new Question('Please enter the rover commands without any spaces (e.g. FRM): ', '');
        $commandString = $helper->ask($input, $output, $commandsQuestion);

        return CommandParser::fromString($commandString);
    }

    /**
     * Ask the rover information (coordinates and orientation)
     *
     * @param $helper
     * @param $input
     * @param $output
     * @return array
     */
    private function roverInformationQuestion($helper, $input, $output)
    {
        $roverQuestion = new Question(
            'Please provide the rover coordinates and orientation separed by one espace each: (e.g. 1 2 N): ',
            ''
        );

        return explode(' ', $helper->ask($input, $output, $roverQuestion));
    }
}