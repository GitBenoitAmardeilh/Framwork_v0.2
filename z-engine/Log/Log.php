<?php

namespace App\Log;

use App\Log\Logger;

class Log extends Logger{

    public function __CONSTRUCT(){

        $this->_file = fopen($this->_path, 'w');

    }

}
