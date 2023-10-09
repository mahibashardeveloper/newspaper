<?php

namespace App\Console\Commands;

use App\Models\Admins;
use App\Models\Settings;
use App\Models\Companies;
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
            'full_name' => 'mahi bashar akash',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
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
        $company_info = array(
            'company_name' => 'Ses Alo',
        );
        Companies::insert([$company_info]);
        print_r("company Name : Ses Alo".PHP_EOL.PHP_EOL);
    }
}
