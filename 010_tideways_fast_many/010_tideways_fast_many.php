<?php

function sub_fast_many($i) {
    return $i;
}
function bottleneck_1s() {
    sleep(1);
}
function application() {
    for ($i = 0; $i < 1 * 1000 * 1000; $i++) {
        sub_fast_many($i);
    }
    bottleneck_1s();
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
