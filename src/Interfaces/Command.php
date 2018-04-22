<?php
namespace NASA\Interfaces;

interface Command
{
    public function execute(Vehicle $vehicle);
}