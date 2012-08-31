<?php

namespace app\Models;

class Exemplo {
    
    public function somar($x, $y) {
        if (!is_numeric($x) or !is_numeric($y))
            throw new \Exception('Nao e numerico');
        return $x + $y;
    }
}
