<?php

namespace Processton\ProcesstonCurrency;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Processton\ProcesstonCurrency\Skeleton\SkeletonClass
 */
class ProcesstonCurrencyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'processton-currency';
    }
}
