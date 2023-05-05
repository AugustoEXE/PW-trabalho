<?php

function sanitizeFilename($filename)
{
    $filename = preg_replace('/[^a-zA-Z0-9_.]/', '', $filename);
    return $filename;
}