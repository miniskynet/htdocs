<?php

class ModuleMarkCalculator{
    public static function calculateModuleMark($cw1, $cw2) {
        return ($cw1 * 0.4) + ($cw2 * 0.6);
    }
}