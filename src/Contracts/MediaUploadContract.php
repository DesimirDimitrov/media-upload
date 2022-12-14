<?php


namespace DesDim\MediaUpload\Contracts;


interface MediaUploadContract
{
    // Validate image/video/file
    public function validate();

    // Save image/video/file
    public function store();
}
