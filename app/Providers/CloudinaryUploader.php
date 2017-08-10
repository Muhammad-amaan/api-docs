<?php

namespace App\Providers;

use Cloudinary;

class CloudinaryUploader
{

    /**
     * Upload a file
     * @param $file
     */
    static function upload($file)
    {
        Cloudinary::config(array(
            "cloud_name" => "cloudinary3180725",
            "api_key" => "586591248362869",
            "api_secret" => "TOHB_MdCSRxKV1OZ3FgscazB4jw"
        ));
        $data = Cloudinary\Uploader::upload($file);
        return $data;
    }

    static function uploadVideo($file, $resource_type)
    {
        Cloudinary::config(array(
            "cloud_name" => "cloudinary3180725",
            "api_key" => "586591248362869",
            "api_secret" => "TOHB_MdCSRxKV1OZ3FgscazB4jw"
        ));
        $data = Cloudinary\Uploader::upload_large($file, $resource_type);
        return $data;
    }
}