<?php

namespace DesDim\MediaUpload;

use DesDim\MediaUpload\Contracts\MediaUploadContract;
use DesDim\MediaUpload\Options\BaseOptions;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaUpload implements MediaUploadContract
{
    protected Request $request;
    protected UploadedFile $file;
    public array $options;

    /**
     * MediaUpload constructor.
     * @param $request
     * @param array $options
     */
    public function __construct($request, array $options = [])
    {
        $this->request = $request;
        $this->validate();
        $this->file = $request->file;
        $this->options = (new BaseOptions($options))->getOptions();
        $this->options['imageName'] = uniqid() . '.' . $this->file->extension();
    }

    /**
     * @return void
     */
    public function store(): void
    {
        if ($this->options['driver'] == 'local') {
            // Save the image to the local storage/public/images folder
            $this->file->move(public_path($this->options['path']), $this->options['imageName']);
        }elseif ($this->options['driver'] == 's3'){
            $filePath = 'images/user/' . $this->options['imageName'];
            Storage::disk('s3')->put($filePath, file_get_contents($this->file));
        }
    }

    /**
     * @return void
     */
    public function validate(): void
    {
        $this->request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512',
        ]);
    }
}
