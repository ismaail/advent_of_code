<?php

namespace Puzzle\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Exception\InvalidArgumentException;

/**
 * Class App
 * @package Puzzle\Console
 */
class App extends Command
{
    /**
     * Configure console application
     */
    public function configure()
    {
        $this
            ->setName('play')
            ->setDescription('Play Puzzle')
            ->setDefinition([
                new InputArgument('day', InputArgument::REQUIRED, 'The Day to play')
            ])
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $day = $input->getArgument('day');

        if (! is_numeric($day)) {
            throw new InvalidArgumentException(sprintf("Day must be an Integer, but got a %s.", gettype($day)));
        }

        $io = new SymfonyStyle($input, $output);

        $result = $this->play($day);

        $io->title("Play day {$day}");
        $io->success($result);
    }

    /**
     * @param int $day
     *
     * @return mixed
     */
    private function play($day)
    {
        $classname = "\\Puzzle\\Day{$day}\\Play";

        if (! class_exists($classname)) {
            throw new InvalidArgumentException("Play class for day {$day} could not be found.");
        }

        return (new $classname)->play();
    }
}
