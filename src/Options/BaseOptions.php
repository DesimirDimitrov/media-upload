<?php


namespace DesDim\MediaUpload\Options;


class BaseOptions
{
    /**
     * @var array|string[]
     * drive: local, s3
     * uploadType: image, video, file
     * path: /
     */
    public array $options = [
        'driver' => 'local',
        'uploadType' => 'image',
        'path' => 'images',
        'width' => null,
        'height' => null,
        'imageName' => '',
        'folder' => 'public',
    ];

    public function __construct(array $options)
    {
        foreach ($options as $key => $value) {
            $this->options[$key] = $value;
        }
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
