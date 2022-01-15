<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CelsiusToFarenheitCommand extends Command
{
    protected static $defaultName = 'app:celsius-to-farenheit';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure(): void
    {
        $this
            ->addArgument('celsius', InputArgument::REQUIRED, 'Celsius Temperature')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('celsius');

        if(!is_numeric($arg1)) {
            $output->writeln('Celsius must be an integer.');

            return Command::INVALID;
        }

        $far = round(($arg1 * 1.8) + 32);

        $output->writeln($far . ' Farenheit');

        return Command::SUCCESS;
    }
}
