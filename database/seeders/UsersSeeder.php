<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $path = dirname(__DIR__, 1) . '/data/users.sql';
        error_log('file in: ' . $path);
        if (file_exists($path)) {
            $h = fopen($path, 'r');
            $content = fread($h, filesize($path));
            DB::unprepared($content);
            fclose($h);
        } else {
            DB::rollBack();
            error_log('error seeding users...');
            return;
        }

        DB::commit();
    }
}
