<?php

namespace App\Console\Commands;

use App\Models\Admins;
use App\Models\Settings;
use Illuminate\Console\Command;

class GenerateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Generate:Admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for generating new Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = array(
            'full_name' => 'Mahi Bashar Akash',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('ideal4321'),
        );
        Admins::insert([$admin]);
        print_r(PHP_EOL.PHP_EOL);
        print_r("Admin Email : ".$admin['email'].PHP_EOL);
        print_r("Admin password : 123123".PHP_EOL.PHP_EOL);
        $settings = array(
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://www.twitter.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'youtube' => 'https://www.youtube.com/',
        );
        Settings::insert([$settings]);
    }
}
