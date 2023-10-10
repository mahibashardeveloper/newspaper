<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveUnnecessaryFiles extends Command
{
    protected $signature = 'remove:all-files';
    protected $description = 'Remove unnecessary files, folders, or images';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $storageAppPath = storage_path('app/public/media');
        $publicStoragePath = public_path('storage/media');


        File::deleteDirectory($storageAppPath);


        File::deleteDirectory($publicStoragePath);


        File::makeDirectory($storageAppPath, 0755, true, true);
        File::makeDirectory($publicStoragePath, 0755, true, true);

        $this->info('remove all images');
    }
}
