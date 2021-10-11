<?php

function sub_200ms() {
    time_nanosleep(0, 200 * 1000 * 1000);
}
function sub_1000ms() {
    bottleneck_1s();
}
function bottleneck_1s() {
    time_nanosleep(1, 0);
}
function application() {
    for ($i = 0; $i < 3; $i++) {
        sub_200ms();
        sub_1000ms();
    }
}

// プログラム終了時の処理として登録
\register_shutdown_function(function () {
    $result = \tideways_xhprof_disable();
    //JSONとして保存
    \file_put_contents(
        './' . \uniqid() . 'myapp.xhprof',
        \json_encode($result)
    );
});
\tideways_xhprof_enable();
\application();
