<?php namespace Bantenprov\BudgetAbsorption\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The BudgetAbsorption facade.
 *
 * @package Bantenprov\BudgetAbsorption
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BudgetAbsorption extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'budget-absorption';
    }
}
