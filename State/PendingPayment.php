<?php
namespace Ant\State;

class PendingPayment extends \Ant\State\Base\State
{
    public function text(): string {
		return 'Pending Payment';
	}
	
	public function cssClass(): string {
		return 'label label-warning badge badge-warning';
	}
}