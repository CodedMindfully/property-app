<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = [
            'Detached',
            'Semi-Detached', 
            'Terraced',
            'Flat',
            'Bungalow',
            'Duplex',
            'Penthouse',
        ];
        // Loop through the $types array and add the values to the property_types table
        // foreach($types as $type){
        //     DB::table('property_types')->insert([
        //         'name' => $type,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        /* In an event that I or someone else accidentally run the migration or refreshes it again
        the db will throw a duplicate entry error (due to the unique() method I used in my property_types table name column).
         I'm using the updateOrInsert() method so db won't throw this error. 
         
        */
         //Loop through the $types array and add/update values in the property_types table
        foreach($types as $type){
            // Using updateOrInsert() prevents duplicate entry errors if the migration runs twice
            DB::table('property_types')->updateOrInsert(
                ['name' => $type],//The Search critirial (Look for this value)
                [
                    'name' => $type,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]//if not found, create with these ($types array), if found, update with these ($types array).
            );
        }
    }
}
