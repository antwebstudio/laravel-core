<?php
namespace Ant\State;

// Confirmed mean paid and confirmed by admin
class Confirmed extends \Ant\State\Base\State
{
    public function text(): string {
		return 'Confirmed';
	}
}