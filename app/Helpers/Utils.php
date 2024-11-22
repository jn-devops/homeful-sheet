<?php

use Illuminate\Support\{Arr, Facades\File, Str};

if (!function_exists('docs_path')) {
    function docs_path(string $path = null): string {
        $docs_path = base_path('resources/docs');

        return $docs_path . ($path ? '/' . $path : '');
    }
}

if (!function_exists('tempES')) {
    function tempES(string $sourcePath, string $method = 'create'): ?string {
        if ($method == "create") {
            $timestamp = now()->format('Ymd_His');
            $tempfilePath = docs_path("ES_Temp".$timestamp.".xlsx");
            File::copy($sourcePath, $tempfilePath);

            return $tempfilePath;
        }
        elseif ($method == "delete"){
            if (File::exists($sourcePath)) {
                File::delete($sourcePath);
            }
        }
    }
}

