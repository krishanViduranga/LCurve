<?php

use Illuminate\Database\Seeder;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sport::create([
          'name'=>'Science',
          'content'=>'Science, technology and society studies, or science and technology studies is the study of how society, politics, and culture affect scientific research and technological innovation, and how these, in turn, affect society, politics and culture',
          'subscribe'=>"There are two types of subscriptions: individual and institutional. To get your personal subscription to Science, please visit our Subscriber Center. To encourage your library to get an institutional subscription to Science, Science Signaling, Science Translational Medicine, Science Immunology or Science Robotics please use our recommendation form. If you are a librarian, please use our form to request a trial subscription for any of our journals.",
          'color'=>'red',
        ]);
        Sport::create([
          'name'=>'Art',
          'content'=>'Art, technology and society studies, or Art and technology studies is the study of how society, politics, and culture affect scientific research and technological innovation, and how these, in turn, affect Art, politics and culture',
          'subscribe'=>"There are two types of subscriptions: individual and institutional. To get your personal subscription to Art, please visit our Subscriber Center. To encourage your library to get an institutional subscription to Art, Art Signaling, Science Translational Medicine, Art Immunology or Science Robotics please use our recommendation form. If you are a librarian, please use our form to request a trial subscription for any of our journals.",
          'color'=>'red',
        ]);
        Sport::create([
          'name'=>'Scouts',
          'content'=>'Art, technology and society studies, or Art and technology studies is the study of how society, politics, and culture affect scientific research and technological innovation, and how these, in turn, affect Art, politics and culture',
          'subscribe'=>"There are two types of subscriptions: individual and institutional. To get your personal subscription to Art, please visit our Subscriber Center. To encourage your library to get an institutional subscription to Art, Art Signaling, Science Translational Medicine, Art Immunology or Science Robotics please use our recommendation form. If you are a librarian, please use our form to request a trial subscription for any of our journals.",
          'color'=>'red',
        ]);
    }
}
