<?php

namespace Modules\Localization\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Localization\Repositories\CityRepository;

class CityTableSeeder extends Seeder
{
    /**
     * @var CityRepository
     */
    private $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $cities = [
            ['id' => '1', 'country_id' => 1, 'name' => 'Adana'],
            ['id' => '2', 'country_id' => 1, 'name' => 'Adıyaman'],
            ['id' => '3', 'country_id' => 1, 'name' => 'Afyonkarahisar'],
            ['id' => '4', 'country_id' => 1, 'name' => 'Ağrı'],
            ['id' => '5', 'country_id' => 1, 'name' => 'Amasya'],
            ['id' => '6', 'country_id' => 1, 'name' => 'Ankara'],
            ['id' => '7', 'country_id' => 1, 'name' => 'Antalya'],
            ['id' => '8', 'country_id' => 1, 'name' => 'Artvin'],
            ['id' => '9', 'country_id' => 1, 'name' => 'Aydın'],
            ['id' => '10', 'country_id' => 1, 'name' => 'Balıkesir'],
            ['id' => '11', 'country_id' => 1, 'name' => 'Bilecik'],
            ['id' => '12', 'country_id' => 1, 'name' => 'Bingöl'],
            ['id' => '13', 'country_id' => 1, 'name' => 'Bitlis'],
            ['id' => '14', 'country_id' => 1, 'name' => 'Bolu'],
            ['id' => '15', 'country_id' => 1, 'name' => 'Burdur'],
            ['id' => '16', 'country_id' => 1, 'name' => 'Bursa'],
            ['id' => '17', 'country_id' => 1, 'name' => 'Çanakkale'],
            ['id' => '18', 'country_id' => 1, 'name' => 'Çankırı'],
            ['id' => '19', 'country_id' => 1, 'name' => 'Çorum'],
            ['id' => '20', 'country_id' => 1, 'name' => 'Denizli'],
            ['id' => '21', 'country_id' => 1, 'name' => 'Diyarbakır'],
            ['id' => '22', 'country_id' => 1, 'name' => 'Edirne'],
            ['id' => '23', 'country_id' => 1, 'name' => 'Elazığ'],
            ['id' => '24', 'country_id' => 1, 'name' => 'Erzincan'],
            ['id' => '25', 'country_id' => 1, 'name' => 'Erzurum'],
            ['id' => '26', 'country_id' => 1, 'name' => 'Eskişehir'],
            ['id' => '27', 'country_id' => 1, 'name' => 'Gaziantep'],
            ['id' => '28', 'country_id' => 1, 'name' => 'Giresun'],
            ['id' => '29', 'country_id' => 1, 'name' => 'Gümüşhane'],
            ['id' => '30', 'country_id' => 1, 'name' => 'Hakkari'],
            ['id' => '31', 'country_id' => 1, 'name' => 'Hatay'],
            ['id' => '32', 'country_id' => 1, 'name' => 'Isparta'],
            ['id' => '33', 'country_id' => 1, 'name' => 'Mersin'],
            ['id' => '34', 'country_id' => 1, 'name' => 'İstanbul'],
            ['id' => '35', 'country_id' => 1, 'name' => 'İzmir'],
            ['id' => '36', 'country_id' => 1, 'name' => 'Kars'],
            ['id' => '37', 'country_id' => 1, 'name' => 'Kastamonu'],
            ['id' => '38', 'country_id' => 1, 'name' => 'Kayseri'],
            ['id' => '39', 'country_id' => 1, 'name' => 'Kırklareli'],
            ['id' => '40', 'country_id' => 1, 'name' => 'Kırşehir'],
            ['id' => '41', 'country_id' => 1, 'name' => 'Kocaeli'],
            ['id' => '42', 'country_id' => 1, 'name' => 'Konya'],
            ['id' => '43', 'country_id' => 1, 'name' => 'Kütahya'],
            ['id' => '44', 'country_id' => 1, 'name' => 'Malatya'],
            ['id' => '45', 'country_id' => 1, 'name' => 'Manisa'],
            ['id' => '46', 'country_id' => 1, 'name' => 'Kahramanmaraş'],
            ['id' => '47', 'country_id' => 1, 'name' => 'Mardin'],
            ['id' => '48', 'country_id' => 1, 'name' => 'Muğla'],
            ['id' => '49', 'country_id' => 1, 'name' => 'Muş'],
            ['id' => '50', 'country_id' => 1, 'name' => 'Nevşehir'],
            ['id' => '51', 'country_id' => 1, 'name' => 'Niğde'],
            ['id' => '52', 'country_id' => 1, 'name' => 'Ordu'],
            ['id' => '53', 'country_id' => 1, 'name' => 'Rize'],
            ['id' => '54', 'country_id' => 1, 'name' => 'Sakarya'],
            ['id' => '55', 'country_id' => 1, 'name' => 'Samsun'],
            ['id' => '56', 'country_id' => 1, 'name' => 'Siirt'],
            ['id' => '57', 'country_id' => 1, 'name' => 'Sinop'],
            ['id' => '58', 'country_id' => 1, 'name' => 'Sivas'],
            ['id' => '59', 'country_id' => 1, 'name' => 'Tekirdağ'],
            ['id' => '60', 'country_id' => 1, 'name' => 'Tokat'],
            ['id' => '61', 'country_id' => 1, 'name' => 'Trabzon'],
            ['id' => '62', 'country_id' => 1, 'name' => 'Tunceli'],
            ['id' => '63', 'country_id' => 1, 'name' => 'Şanlıurfa'],
            ['id' => '64', 'country_id' => 1, 'name' => 'Uşak'],
            ['id' => '65', 'country_id' => 1, 'name' => 'Van'],
            ['id' => '66', 'country_id' => 1, 'name' => 'Yozgat'],
            ['id' => '67', 'country_id' => 1, 'name' => 'Zonguldak'],
            ['id' => '68', 'country_id' => 1, 'name' => 'Aksaray'],
            ['id' => '69', 'country_id' => 1, 'name' => 'Bayburt'],
            ['id' => '70', 'country_id' => 1, 'name' => 'Karaman'],
            ['id' => '71', 'country_id' => 1, 'name' => 'Kırıkkale'],
            ['id' => '72', 'country_id' => 1, 'name' => 'Batman'],
            ['id' => '73', 'country_id' => 1, 'name' => 'Şırnak'],
            ['id' => '74', 'country_id' => 1, 'name' => 'Bartın'],
            ['id' => '75', 'country_id' => 1, 'name' => 'Ardahan'],
            ['id' => '76', 'country_id' => 1, 'name' => 'Iğdır'],
            ['id' => '77', 'country_id' => 1, 'name' => 'Yalova'],
            ['id' => '78', 'country_id' => 1, 'name' => 'Karabük'],
            ['id' => '79', 'country_id' => 1, 'name' => 'Kilis'],
            ['id' => '80', 'country_id' => 1, 'name' => 'Osmaniye'],
            ['id' => '81', 'country_id' => 1, 'name' => 'Düzce']
        ];

        \DB::table('localization__cities')->truncate();

        foreach ($cities as $city) {
            $this->city->create($city);
        }
    }
}
