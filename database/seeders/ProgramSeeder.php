<?php

namespace Database\Seeders;
 use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Program::create([
    'title' => 'Computer Science',
    'type' => 'bachelor',
    'duration' => '4 Years',
    'credits' => 120,
    'intake' => 'Fall & Spring',
    'image' => 'assets/img/education/education-1.webp',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
]);
    }
   



}
