<?php

namespace Soarecostin\BladeFormComponents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Soarecostin\BladeFormComponents\Skeleton\SkeletonClass
 */
class BladeFormComponentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blade-form-components';
    }
}
