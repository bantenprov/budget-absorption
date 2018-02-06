<?php namespace Bantenprov\BudgetAbsorption\Console\Commands;

use Illuminate\Console\Command;

/**
 * The BudgetAbsorptionCommand class.
 *
 * @package Bantenprov\BudgetAbsorption
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BudgetAbsorptionCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:budget-absorption';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\BudgetAbsorption package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\BudgetAbsorption package');
    }
}
