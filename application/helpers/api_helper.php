<?php

function response($success = false, $message = 'Terjadi kesalahan', $data = null)
{
    $out['success'] = $success;
    $out['message'] = $message;
    $out['data'] = $data;

    header('Content-Type: application/json');
    return json_encode($out);
}
