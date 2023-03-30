<?php

if (!function_exists('imageExist'))
{
    function imageExist(string|null $imagePath, string $defaultImagePath): string
    {
        if (!file_exists(public_path($imagePath)) || is_null($imagePath))
        {
            $imagePath = $defaultImagePath;
        }
        return asset($imagePath);
    }
}
