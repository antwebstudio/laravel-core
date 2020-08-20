<?php
namespace Ant\State;

// ConfirmedButNotPaid mean confirmed by customer but not yet paid
class ConfirmedButNotPaid extends \Ant\State\Base\State
{
    public function text(): string {
		return 'Confirmed (Not Paid)';
	}
}