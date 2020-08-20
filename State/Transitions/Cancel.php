<?php
namespace Ant\State\Transitions;

use Illuminate\Database\Eloquent\Model;
use Ant\State\Exceptions\TransitionException;
use Carbon\Carbon;

class Cancel extends DefaultTransition {
    public function handle()
    {
		$this->model->canceled_at = Carbon::now();
		
        return parent::handle();
    }
}