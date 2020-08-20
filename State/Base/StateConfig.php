<?php
namespace Ant\State\Base;

use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\DefaultTransition;

class StateConfig extends \Spatie\ModelStates\StateConfig
{
    public function resolveTransition(Model $model, string $from, string $to)
    {
        $transitionKey = $this->_createTransitionKey($from, $to);

        if (! array_key_exists($transitionKey, $this->allowedTransitions)) {
            return;
        }
		
		$class = $this->allowedTransitions[$transitionKey] ?? DefaultTransition::class;

        return new $class(
                $model,
                $this->field,
                $this->stateClass::make($to, $model)
            );
    }

    private function _createTransitionKey(string $from, string $to): string
    {
        return "{$from}-{$to}";
    }
}