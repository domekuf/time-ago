<?php

require('vendor/autoload.php');

use DomeKuf\TimeAgo;

$t = new TimeAgo(1560356031);
echo $t->toString();
