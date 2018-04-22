<?php

namespace NASA\Tests\Commands;

use NASA\Commands\RoverManagerCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use \PHPUnit\Framework\TestCase;

class CreateUserCommandTest extends TestCase
{
    /**
     * @var Application
     */
    public $application;

    /**
     * @var \Symfony\Component\Console\Command\Command
     */
    public $command;

    /**
     * @var CommandTester
     */
    public $tester;

    public function setUp()
    {
        $this->application = new Application();
        $this->application->add(new RoverManagerCommand());

        $this->command = $this->application->find('rover-manager');
        $this->tester = new CommandTester($this->command);
    }

    public function testExecuteShouldBreakWithMessage()
    {
        $this->tester->setInputs(array('5 0'));
        $this->tester->execute(array(
            'command'  => $this->command->getName(),
        ));

        // the output of the command in the console
        $output = $this->tester->getDisplay();
        $this->assertContains('The command cannot be executed. Something is wrong, sorry.', $output);
    }

    public function testExecuteCommandWithOneRover()
    {
        $this->tester->setInputs(['5 5', '1 2 N', 'LMLMLMLMM', 'no']);

        $this->tester->execute([
            'command'  => $this->command->getName(),
        ]);

        // the output of the command in the console
        $output = $this->tester->getDisplay();

        $this->assertContains('1 3 N', $output);
    }

    public function testExecuteCommandWithTwoRovers()
    {
        $this->tester->setInputs(['5 5', '1 2 N', 'LMLMLMLMM', 'yes', '3 3 E', 'MMRMMRMRRM', 'no']);

        $this->tester->execute([
            'command'  => $this->command->getName(),
        ]);

        // the output of the command in the console
        $output = $this->tester->getDisplay();

        $this->assertContains('1 3 N', $output);
    }
}
