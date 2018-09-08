<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Jaworski
 * Date: 08.09.2018
 * Time: 21:11
 */

namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
{
    protected function configure()
    {
        $this->setName('add')
            ->setDescription('Add a new task')
            ->addArgument('description', InputArgument::REQUIRED);
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->database->query(
            'INSERT INTO tasks(description) VALUES (:description)',
            compact('description')
        );

        $output->writeln('<info>Task Added!</info>');

        $this->showTasks($output);
    }
}