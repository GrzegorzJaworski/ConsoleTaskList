<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Jaworski
 * Date: 08.09.2018
 * Time: 21:27
 */

namespace Acme;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
    protected function configure()
    {
        $this->setName('complete')
            ->setDescription('Complete a task by its id')
            ->addArgument('id', InputArgument::REQUIRED);
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query(
            'DELETE FROM tasks WHERE id = :id',
            compact('id')
        );

        $output->writeln('<info>Task Completed!</info>');
        $this->showTasks($output);
    }
}