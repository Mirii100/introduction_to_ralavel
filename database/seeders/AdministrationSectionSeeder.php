<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
    use App\Models\AdministrationSection;
class AdministrationSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    


public function run()
{
    AdministrationSection::create([
        'subtitle' => 'Meet Our Leadership',
        'heading' => 'Dedicated Administration Guiding Our Educational Excellence',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ipsum sit nibh amet egestas tellus. Eu leo morbi massa sem faucibus nulla gravida vulputate adipiscing. Sed malesuada quam scelerisque amet commodo arcu mollis.',
        'years_of_excellence' => '25+',
        'faculty_members' => '45+',
        'student_success' => '98%',
    ]);
}

}
