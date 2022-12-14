<?php

namespace DesDim\MediaUpload;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DesDim\MediaUpload\Skeleton\SkeletonClass
 */
class MediaUploadFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'media-upload';
    }
}
