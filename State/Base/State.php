<?php
namespace Ant\State\Base;

abstract class State extends \Spatie\ModelStates\State
{
    abstract public function text(): string;
}