<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(RegionsTableSeeder::class);

        /*
            $this->call(PlacesTableSeeder::class);

          $this->call(ImagesTableSeeder::class);
          $this->call(OpeningHoursTableSeeder::class);
          $this->call(BeaconsTableSeeder::class);
          $this->call(TagsTableSeeder::class);

          $this->call(EventsTableSeeder::class);
            $this->call(PostsTableSeeder::class);
           $this->call(LogTableSeeder::class);*/
    }
}
