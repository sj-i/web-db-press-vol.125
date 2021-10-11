<?php
$login_id = 'test_user';

error_log("ログインエラー login_id={$login_id}");
error_log(
    sprintf(
        "ログインエラー login_id=%s",
        $login_id
    )
);
