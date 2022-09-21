<?php

/*
 * Common helper functions.
 */


use Illuminate\Support\Facades\Storage;

if (!function_exists('public_path')) {

    /**
     * Return the path to public dir
     * @param null $path
     * @return string
     */
    function public_path($path = null)
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}

if (!function_exists('storage_path')) {

    /**
     * Return the path to storage dir
     * @param null $path
     * @return string
     */
    function storage_path($path = null)
    {
        return app()->storagePath($path);
    }
}


if (!function_exists('uploadsStorage')) {
    /**
     * Generate random hex color code.
     */
    function uploadsStorage()
    {
        return Storage::disk(config('filesystems.default'));
    }
}
