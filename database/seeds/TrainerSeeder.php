<?php

use App\Trainer;
use App\Location;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Abbotsford
        $trainer = new Trainer();
        $trainer->first_name = 'Tony';
        $trainer->middle_name = 'Steven';
        $trainer->last_name = 'McDonald';
        $trainer->email = 'tony@if.com';
        $trainer->active = true;
        $location = Location::where('name','Abbotsford')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Margo';
        $trainer->middle_name = '';
        $trainer->last_name = 'Ransome';
        $trainer->email = 'margo@if.com';
        $trainer->active = true;
        $location = Location::where('name','Abbotsford')->first();
        $location->locationTrainer()->save($trainer);

        // Coquitlam
        $trainer = new Trainer();
        $trainer->first_name = 'Delphia';
        $trainer->middle_name = '';
        $trainer->last_name = 'Foulks';
        $trainer->email = 'delphia@if.com';
        $trainer->active = true;
        $location = Location::where('name','Coquitlam')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Gina';
        $trainer->middle_name = '';
        $trainer->last_name = 'Gravley';
        $trainer->email = 'gina@if.com';
        $trainer->active = true;
        $location = Location::where('name','Coquitlam')->first();
        $location->locationTrainer()->save($trainer);

        //Kitsilano
        $trainer = new Trainer();
        $trainer->first_name = 'Jule';
        $trainer->middle_name = '';
        $trainer->last_name = 'Zaldivar';
        $trainer->email = 'jule@if.com';
        $trainer->active = true;
        $location = Location::where('name','Kitsilano')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Napolean';
        $trainer->middle_name = '';
        $trainer->last_name = 'Berge';
        $trainer->email = 'napolean@if.com';
        $trainer->active = true;
        $location = Location::where('name','Kitsilano')->first();
        $location->locationTrainer()->save($trainer);

        //North Vancouver
        $trainer = new Trainer();
        $trainer->first_name = 'Yi';
        $trainer->middle_name = '';
        $trainer->last_name = 'Sauceda';
        $trainer->email = 'yi@if.com';
        $trainer->active = true;
        $location = Location::where('name','North Vancouver')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Yen';
        $trainer->middle_name = '';
        $trainer->last_name = 'Hidalgo';
        $trainer->email = 'yen@if.com';
        $trainer->active = true;
        $location = Location::where('name','North Vancouver')->first();
        $location->locationTrainer()->save($trainer);

        //Port Moody
        $trainer = new Trainer();
        $trainer->first_name = 'Devora';
        $trainer->middle_name = '';
        $trainer->last_name = 'Reeser';
        $trainer->email = 'devora@if.com';
        $trainer->active = true;
        $location = Location::where('name','Port Moody')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Olympia';
        $trainer->middle_name = '';
        $trainer->last_name = 'Lowery';
        $trainer->email = 'olympia@if.com';
        $trainer->active = true;
        $location = Location::where('name','Port Moody')->first();
        $location->locationTrainer()->save($trainer);

        //Telus Garden
        $trainer = new Trainer();
        $trainer->first_name = 'Una';
        $trainer->middle_name = '';
        $trainer->last_name = 'Mattingly';
        $trainer->email = 'una@if.com';
        $trainer->active = true;
        $location = Location::where('name','Telus Garden')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Queenie';
        $trainer->middle_name = '';
        $trainer->last_name = 'Mcelroy';
        $trainer->email = 'queenie@if.com';
        $trainer->active = true;
        $location = Location::where('name','Telus Garden')->first();
        $location->locationTrainer()->save($trainer);

        //Toronto
        $trainer = new Trainer();
        $trainer->first_name = 'Cherrie';
        $trainer->middle_name = '';
        $trainer->last_name = 'Shumway';
        $trainer->email = 'cherrie@if.com';
        $trainer->active = true;
        $location = Location::where('name','Toronto')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Catharine';
        $trainer->middle_name = '';
        $trainer->last_name = 'Mendonca';
        $trainer->email = 'catharine@if.com';
        $trainer->active = true;
        $location = Location::where('name','Toronto')->first();
        $location->locationTrainer()->save($trainer);

        //Victoria
        $trainer = new Trainer();
        $trainer->first_name = 'Jann';
        $trainer->middle_name = '';
        $trainer->last_name = 'Berthold';
        $trainer->email = 'jann@if.com';
        $trainer->active = true;
        $location = Location::where('name','Victoria')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Berna';
        $trainer->middle_name = '';
        $trainer->last_name = 'Cavalieri';
        $trainer->email = 'berna@if.com';
        $trainer->active = true;
        $location = Location::where('name','Victoria')->first();
        $location->locationTrainer()->save($trainer);

        //West Vancouver
        $trainer = new Trainer();
        $trainer->first_name = 'Roberto';
        $trainer->middle_name = '';
        $trainer->last_name = 'Ferriera';
        $trainer->email = 'roberto@if.com';
        $trainer->active = true;
        $location = Location::where('name','West Vancouver')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Fiona';
        $trainer->middle_name = '';
        $trainer->last_name = 'Watts';
        $trainer->email = 'fiona@if.com';
        $trainer->active = true;
        $location = Location::where('name','West Vancouver')->first();
        $location->locationTrainer()->save($trainer);

        //White Rock
        $trainer = new Trainer();
        $trainer->first_name = 'Kerri';
        $trainer->middle_name = '';
        $trainer->last_name = 'McGeorge';
        $trainer->email = 'kerri@if.com';
        $trainer->active = true;
        $location = Location::where('name','White Rock')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Joline';
        $trainer->middle_name = '';
        $trainer->last_name = 'Bierman';
        $trainer->email = 'joline@if.com';
        $trainer->active = true;
        $location = Location::where('name','White Rock')->first();
        $location->locationTrainer()->save($trainer);

        //Walnut Grove
        $trainer = new Trainer();
        $trainer->first_name = 'Sari';
        $trainer->middle_name = '';
        $trainer->last_name = 'Rupe';
        $trainer->email = 'sari@if.com';
        $trainer->active = true;
        $location = Location::where('name','Walnut Grove')->first();
        $location->locationTrainer()->save($trainer);

        $trainer = new Trainer();
        $trainer->first_name = 'Ian';
        $trainer->middle_name = '';
        $trainer->last_name = 'Johnson';
        $trainer->email = 'ian@if.com';
        $trainer->active = true;
        $location = Location::where('name','Walnut Grove')->first();
        $location->locationTrainer()->save($trainer);
    }
}
