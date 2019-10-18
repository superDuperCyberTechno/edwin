# edwin
### AKA _Digital Ocean Spaces File System Driver for Laravel_
A simple extension that adds the [Digital Ocean Spaces](https://www.digitalocean.com/products/spaces/) as a file system extension to Laravel.

Just install via Composer:

```
composer require superdupercybertechno/edwin
```

... add the driver to `app/filesystems.php`...:

```
'spaces' => [
    'driver' => 'spaces',
    'key' => env('DIGITAL_OCEAN_SPACES_KEY'),
    'secret' => env('DIGITAL_OCEAN_SPACES_SECRET'),
    'region' => env('DIGITAL_OCEAN_SPACES_REGION'),
    'bucket' => env('DIGITAL_OCEAN_SPACES_BUCKET'),
],
```

... and finally add the credentials to `.env`:

```
DIGITAL_OCEAN_SPACES_KEY=[your key]
DIGITAL_OCEAN_SPACES_SECRET=[your secret]
DIGITAL_OCEAN_SPACES_REGION=[your region]
DIGITAL_OCEAN_SPACES_BUCKET=[your bucket name]
```

At this point you should be good to go!
