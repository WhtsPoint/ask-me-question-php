<?php

//TODO: MAKE CUSTOM EXCEPTION WITH VALID DATA DISPLAYED

trait TLimitedString {
    private function size(?int $min = NULL, ?int $max = NULL): void {
        $length = mb_strlen($this->value); 

        if (($min && $length < $min) ||($max && $length > $max)) {
            $minText = $min ? 'min: ' . $min  . ',': '';
            $maxText = $max ? 'max: ' . $max : '';
            throw new InvalidArgumentException(
                    'Invalid ' . strtolower(static::class) . ' length (' . $minText . $maxText . ') given: ' . $length
            );
        }
    }
}