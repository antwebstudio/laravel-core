<?php
namespace Ant\State\Transitions;

use Illuminate\Database\Eloquent\Model;
use Ant\State\Exceptions\TransitionException;

class Payment extends DefaultTransition {
    public function handle()
    {
		if (!$this->model->isPaid()) throw new TransitionException();
		
        return parent::handle();
    }
}