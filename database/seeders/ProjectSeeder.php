<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//model
use App\Models\Project;
use App\Models\Type;
//helper
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });      
        
        Storage::deleteDirectory('uploads/images');
        Storage::makeDirectory('uploads/images');
        
        for ($i=0; $i < 30; $i++) { 
            $randomType = Type::inRandomOrder()->first()->id;
            
            $coverImg = null;
            if (fake()->boolean()) {
                $coverImg = fake()->image(storage_path('app/public/uploads/images'), 360, 360, 'animals', false, true, 'cats', false, 'jpg');
                if ($coverImg != '') {
                    $coverImg = 'uploads/images/'.$coverImg;
                }
                else {
                    $coverImg = null;
                }
            }
        
            Project::create([
                'title'=> substr(fake()->sentence(3),0,100),
                'preview'=> $coverImg,
                'collaborators'=>substr(fake()->sentence(3),0,255),
                'description'=> fake()->paragraph(),
                'type_id'=> $randomType,
            ]);

            // $rendomType = Type::inRandomOrder()->first();
            
            // Project::create([
            //     'title'=> substr(fake()->sentence(3),0,100),
            //     'preview'=> fake()->imageUrl(400, 300),
            //     'collaborators'=>substr(fake()->sentence(3),0,255),
            //     'description'=> fake()->paragraph(),
            //     'type_id'=> $rendomType->id,
            // ]);

        }
    }
}
