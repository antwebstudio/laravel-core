<?php
namespace Ant\State;

// Canceled mean cancelled by customer, use Closed if it is cancelled by admin
class Canceled extends \Ant\State\Base\State
{
    public function text(): string {
		return 'Cancelled';
	}
}