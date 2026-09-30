<?php

class Validator {

    public function string(string $value, int $min = 2, int $max = 255): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public function int(mixed $value, int $min = 0, float $max = INF): bool
    {
        $value = filter_var($value, FILTER_VALIDATE_INT);

        if ($value < $min || $value > $max) {
            return false;
        }

        return $value !== false;
    }
}