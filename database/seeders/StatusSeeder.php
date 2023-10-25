<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            'name' => 'New'
        ]);
        DB::table('status')->insert([
            'name' => 'Completed'
        ]);
        DB::table('status')->insert([
            'name' => 'Cancelled'
        ]);
    }
}