<?php

namespace Ant\State\Traits;

use Ant\State\Base\StateConfig;

trait HasStates
{
	use \Spatie\ModelStates\HasStates;

    protected function addState(string $field, string $stateClass): StateConfig
    {
        $stateConfig = new StateConfig($field, $stateClass);

        static::$stateFields[$stateConfig->field] = $stateConfig;

        return $stateConfig;
    }
}