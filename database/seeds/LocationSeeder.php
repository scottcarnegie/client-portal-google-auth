<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newLocation = new Location();
        $newLocation -> name = "Abbotsford";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Coquitlam";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Kitsilano";
        $newLocation -> save();
        
        $newLocation = new Location();
        $newLocation -> name = "North Vancouver";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Port Moody";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Telus Garden";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Toronto";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Victoria";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "West Vancouver";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "White Rock";
        $newLocation -> save();

        $newLocation = new Location();
        $newLocation -> name = "Walnut Grove";
        $newLocation -> save();
    }
}
