<?php
namespace Ant\State;

// Paid mean fully paid
class Paid extends \Ant\State\Base\State
{
    public function text(): string {
		return 'Paid';
	}
	
	public function cssClass(): string {
		return 'label label-success badge badge-success';
	}
}