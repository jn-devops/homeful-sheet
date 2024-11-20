<?php

use Endroid\QrCode\{QrCode, Writer\PngWriter};
use Illuminate\Support\{Arr, Str};

if (!function_exists('docs_path')) {
    function docs_path(string $path = null): string {
        $docs_path = base_path('resources/docs');

        return $docs_path . ($path ? '/' . $path : '');
    }
}

