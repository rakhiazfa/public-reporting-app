<?php

namespace Database\Seeders;

use App\Models\ReportCategory;
use App\Models\ReportSubcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ReportCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $fileContent = File::get(base_path('database/json/ReportCategories.json'));
        $reportCategories = json_decode($fileContent);

        foreach ($reportCategories as $reportCategory) {

            $category = ReportCategory::create(['name' => $reportCategory->name]);

            foreach ($reportCategory->report_subcategories as $reportSubcategory) {

                ReportSubcategory::create([
                    'name' => $reportSubcategory->name,
                    'report_category_id' => $category->id
                ]);
            }
        }
    }
}
