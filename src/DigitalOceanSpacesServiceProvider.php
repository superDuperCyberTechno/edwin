<?php

namespace superDuperCyberTechno\Edwin;

use Storage;
use Aws\S3\S3Client;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class DigitalOceanSpacesServiceProvider extends ServiceProvider{
    public function register(){
        //
    }

    public function boot()
    {
        //extend the storage class and add the driver
        Storage::extend('spaces', function ($app, $config) {
            $client = new S3Client([
                //pass the client config directly into the constructor
                'credentials' => [
                    'key'    => $config['key'],
                    'secret' => $config['secret'],
                ],
                'region' => $config['region'],
                'endpoint' => 'https://' . $config['bucket'] . '.' . $config['region'] . '.digitaloceanspaces.com',
            ]);

            //create adapter and return the filesystem var
            $adapter = new AwsS3Adapter($client, $config['bucket']);
            $filesystem = new Filesystem($adapter);

            return $filesystem;
        });
    }
}
