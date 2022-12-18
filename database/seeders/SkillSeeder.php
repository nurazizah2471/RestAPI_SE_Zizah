<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = ['Jalan Cepat', 'Lari Cepat', 'Lari Jarak Jauh', 'Lari Lintas Alam', 'Lempar Lembing',
        'Lompat Jangkit', 'Lompat Jauh', 'Maraton', 'Aerobik', 'Body Attack', 'Body Combat', 'Body Pump',
        'Pilates', 'Postnatal Gym', 'Prenatal Gym', 'Skipping', 'Zumba', 'Angkat Berat', 'Golf', 'Hula Hoop',
        'Mendaki', 'Menembak', 'Orienteering', 'Panahan', 'Parkour', 'Senam Akrobatik', 'Senam Artistik',
        'Senam Ritmik', 'Sepak Bola Meja', 'Trampolining', 'Tumbling', 'Aikido', 'Anggar', 'Capoeira', 'Combat Sports',
        'French Kickboxing', 'Gulat', 'Hapkido', 'Jeet Kune Do', 'Jiu-Jitsu', 'Judo', 'Kajukenbo', 'Karate', 'Kendo',
        'Kenpo', 'Krav Maga', 'Kung-fu', 'Muay Thai', 'Ninjutsu', 'Pencak Silat', 'Taekwondo', 'Tinju', 'Wing Chun',
        'Bulu Tangkis', 'Tenis', 'Tenis Meja', 'Aqua Gym', 'Aquathlon', 'Menyelam', 'Polo Air', 'Renang', 'Renang Sinkronisasi',
        'American Football', 'Baseball', 'Bola Basket', 'Bola Tangan', 'Cricket', 'Futsal', 'Rugby', 'Softball', 'Bola Voli',
        'Breakdance', 'Dansa Vallroom Latin', 'Jazz Dancing', 'Ki Zomba', 'Koreografi', 'Menari', 'Pole Dance', 'Tari Balet',
        'Tari Hip Hop', 'Tari Modern', 'Tari Perut', 'Tari Tradisional', 'Tarian Kontemporer', 'Tarian Urban', 'Ashtanga Yoga',
        'Bikram Yoga', 'Kundalini Yoga', 'Prenatal Yoga', 'Relaksasi Yoga', 'Vinyasa Yoga', 'Bersepeda', 'Mendayung',
        'Motorcycling', 'Rafting', 'Rollerskating'.'Selancar', 'Skateboarding', ];

        foreach ($skill as $skill) {
            Skill::create([
                'name' => $skill,
            ]);
        }
    }
}
