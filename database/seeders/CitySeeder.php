<?php


namespace Database\Seeders;


use App\Models\City;
use App\Models\Creator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
            collect([
                "Skopje",
                "Tetovo",
                "Bitola",
                "Kumanovo",
                "Prilep",
                "Ohrid",
                "Strumica",
                "Veles",
                "Shtip",
                "Kavadarci",
                "Gostivar",
                "Kochani",
                "Kichevo",
                "Struga",
                "Radovish",
                "Gevgelija",
                "Debar",
                "Kriva Palanka",
                "Sveti Nikole",
                "Negotino",
                "Delchevo",
                "Vinica",
                "Probishtip",
                "Arachinovo",
                "Berovo",
                "Kratovo",
                "Bogovinje",
                "Bogdanci",
                "Studenichani",
                "Sopishte",
                "Krushevo",
                "Vrapchishte",
                "Valandovo",
                "Zhelino",
                "Tearce",
                "Makedonski Brod",
                "Demir Kapija",
                "Pehchevo",
                "Brvenica",
                "Novo Selo",
                "Vevchani",
                "Petrovec",
                "Lipkovo",
                "Demir Hisar",
                "Rosoman",
                "Plasnica",
                "Mogila",
                "Krivogashtani",
                "Zrnovci",
                "Gradsko",
                "Vasilevo",
                "Bosilovo",
                "Staro Nagorichane",
                "Rankovce",
                "Novaci",
                "Konche",
                "Obleshevo",
                "Belchishta",
                "Jegunovce",
                "Lozovo",
                "Dolneni",
                "Rostusha",
                "Centar Zhupa",
                "Zelenikovo",
                "Chucher-Sandevo",
                "Karbinci",
                "Star Dojran",
                "Ilinden",
                "Makedonska Kamenica",
                "Resen"
            ])->each(fn($city) => City::create(['name' => $city]));
    }
}
