<?php

if (!function_exists('app_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('getExceptionMessage')) {
    function getExceptionMessage(\Exception $e)
    {
        if (isset($e->response->original)) {
            return $e->response->original;
        }
        return $e->getMessage();
    }
}

if (!function_exists('getTable')) {
    function getTable(string|object $model, string $alias)
    {
        $table = is_string($model) ? app($model)->getTable() : $model->getTable();
        return "$table AS $alias";
    }
}

if (!function_exists('hasRole')) {
    function hasRole(string $role, ?array $roles = null)
    {
        return in_array(strtolower($role), array_map(function ($item) {
            return strtolower($item['role']);
        }, ($roles ?? auth()->user()->roles->toArray())));
    }
}

if (!function_exists('getRoleIds')) {
    function getRoleIds(?array $roles = null)
    {
        return collect(($roles ?? auth()->user()->roles->toArray()))->pluck('id')->toArray();
    }
}
