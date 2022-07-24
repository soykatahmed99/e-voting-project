<?php

function saveImage ($image, $directory, $modeImagePath = null)
{
    if ($image)
    {
        if (isset($modeImagePath))
        {
            if (file_exists($modeImagePath))
            {
                unlink($modeImagePath);
            }
        }
        $imageName = rand(10, 100).$image->getClientOriginalName();

        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
    }
    else
    {
        $imageUrl = $modeImagePath;
    }
    return $imageUrl;
}
