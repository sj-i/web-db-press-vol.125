<?php

function sub_fast_many($i)
{
    return $i;
}

function bottleneck_1s()
{
    sleep(1);
}

function application()
{
    $start = microtime(true);
    for ($i = 0; $i < 1 * 1000 * 1000; $i++) {
        sub_fast_many($i);
    }
    echo microtime(true) - $start;
    bottleneck_1s();
}

\application();
