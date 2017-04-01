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
            ['id' => '1', 'country_id' => 1, 'tr' => ['name' => 'Adana']],
            ['id' => '2', 'country_id' => 1, 'tr' => ['name' => 'Adıyaman']],
            ['id' => '3', 'country_id' => 1, 'tr' => ['name' => 'Afyonkarahisar']],
            ['id' => '4', 'country_id' => 1, 'tr' => ['name' => 'Ağrı']],
            ['id' => '5', 'country_id' => 1, 'tr' => ['name' => 'Amasya']],
            ['id' => '6', 'country_id' => 1, 'tr' => ['name' => 'Ankara']],
            ['id' => '7', 'country_id' => 1, 'tr' => ['name' => 'Antalya']],
            ['id' => '8', 'country_id' => 1, 'tr' => ['name' => 'Artvin']],
            ['id' => '9', 'country_id' => 1, 'tr' => ['name' => 'Aydın']],
            ['id' => '10', 'country_id' => 1, 'tr' => ['name' => 'Balıkesir']],
            ['id' => '11', 'country_id' => 1, 'tr' => ['name' => 'Bilecik']],
            ['id' => '12', 'country_id' => 1, 'tr' => ['name' => 'Bingöl']],
            ['id' => '13', 'country_id' => 1, 'tr' => ['name' => 'Bitlis']],
            ['id' => '14', 'country_id' => 1, 'tr' => ['name' => 'Bolu']],
            ['id' => '15', 'country_id' => 1, 'tr' => ['name' => 'Burdur']],
            ['id' => '16', 'country_id' => 1, 'tr' => ['name' => 'Bursa']],
            ['id' => '17', 'country_id' => 1, 'tr' => ['name' => 'Çanakkale']],
            ['id' => '18', 'country_id' => 1, 'tr' => ['name' => 'Çankırı']],
            ['id' => '19', 'country_id' => 1, 'tr' => ['name' => 'Çorum']],
            ['id' => '20', 'country_id' => 1, 'tr' => ['name' => 'Denizli']],
            ['id' => '21', 'country_id' => 1, 'tr' => ['name' => 'Diyarbakır']],
            ['id' => '22', 'country_id' => 1, 'tr' => ['name' => 'Edirne']],
            ['id' => '23', 'country_id' => 1, 'tr' => ['name' => 'Elazığ']],
            ['id' => '24', 'country_id' => 1, 'tr' => ['name' => 'Erzincan']],
            ['id' => '25', 'country_id' => 1, 'tr' => ['name' => 'Erzurum']],
            ['id' => '26', 'country_id' => 1, 'tr' => ['name' => 'Eskişehir']],
            ['id' => '27', 'country_id' => 1, 'tr' => ['name' => 'Gaziantep']],
            ['id' => '28', 'country_id' => 1, 'tr' => ['name' => 'Giresun']],
            ['id' => '29', 'country_id' => 1, 'tr' => ['name' => 'Gümüşhane']],
            ['id' => '30', 'country_id' => 1, 'tr' => ['name' => 'Hakkari']],
            ['id' => '31', 'country_id' => 1, 'tr' => ['name' => 'Hatay']],
            ['id' => '32', 'country_id' => 1, 'tr' => ['name' => 'Isparta']],
            ['id' => '33', 'country_id' => 1, 'tr' => ['name' => 'Mersin']],
            ['id' => '34', 'country_id' => 1, 'tr' => ['name' => 'İstanbul']],
            ['id' => '35', 'country_id' => 1, 'tr' => ['name' => 'İzmir']],
            ['id' => '36', 'country_id' => 1, 'tr' => ['name' => 'Kars']],
            ['id' => '37', 'country_id' => 1, 'tr' => ['name' => 'Kastamonu']],
            ['id' => '38', 'country_id' => 1, 'tr' => ['name' => 'Kayseri']],
            ['id' => '39', 'country_id' => 1, 'tr' => ['name' => 'Kırklareli']],
            ['id' => '40', 'country_id' => 1, 'tr' => ['name' => 'Kırşehir']],
            ['id' => '41', 'country_id' => 1, 'tr' => ['name' => 'Kocaeli']],
            ['id' => '42', 'country_id' => 1, 'tr' => ['name' => 'Konya']],
            ['id' => '43', 'country_id' => 1, 'tr' => ['name' => 'Kütahya']],
            ['id' => '44', 'country_id' => 1, 'tr' => ['name' => 'Malatya']],
            ['id' => '45', 'country_id' => 1, 'tr' => ['name' => 'Manisa']],
            ['id' => '46', 'country_id' => 1, 'tr' => ['name' => 'Kahramanmaraş']],
            ['id' => '47', 'country_id' => 1, 'tr' => ['name' => 'Mardin']],
            ['id' => '48', 'country_id' => 1, 'tr' => ['name' => 'Muğla']],
            ['id' => '49', 'country_id' => 1, 'tr' => ['name' => 'Muş']],
            ['id' => '50', 'country_id' => 1, 'tr' => ['name' => 'Nevşehir']],
            ['id' => '51', 'country_id' => 1, 'tr' => ['name' => 'Niğde']],
            ['id' => '52', 'country_id' => 1, 'tr' => ['name' => 'Ordu']],
            ['id' => '53', 'country_id' => 1, 'tr' => ['name' => 'Rize']],
            ['id' => '54', 'country_id' => 1, 'tr' => ['name' => 'Sakarya']],
            ['id' => '55', 'country_id' => 1, 'tr' => ['name' => 'Samsun']],
            ['id' => '56', 'country_id' => 1, 'tr' => ['name' => 'Siirt']],
            ['id' => '57', 'country_id' => 1, 'tr' => ['name' => 'Sinop']],
            ['id' => '58', 'country_id' => 1, 'tr' => ['name' => 'Sivas']],
            ['id' => '59', 'country_id' => 1, 'tr' => ['name' => 'Tekirdağ']],
            ['id' => '60', 'country_id' => 1, 'tr' => ['name' => 'Tokat']],
            ['id' => '61', 'country_id' => 1, 'tr' => ['name' => 'Trabzon']],
            ['id' => '62', 'country_id' => 1, 'tr' => ['name' => 'Tunceli']],
            ['id' => '63', 'country_id' => 1, 'tr' => ['name' => 'Şanlıurfa']],
            ['id' => '64', 'country_id' => 1, 'tr' => ['name' => 'Uşak']],
            ['id' => '65', 'country_id' => 1, 'tr' => ['name' => 'Van']],
            ['id' => '66', 'country_id' => 1, 'tr' => ['name' => 'Yozgat']],
            ['id' => '67', 'country_id' => 1, 'tr' => ['name' => 'Zonguldak']],
            ['id' => '68', 'country_id' => 1, 'tr' => ['name' => 'Aksaray']],
            ['id' => '69', 'country_id' => 1, 'tr' => ['name' => 'Bayburt']],
            ['id' => '70', 'country_id' => 1, 'tr' => ['name' => 'Karaman']],
            ['id' => '71', 'country_id' => 1, 'tr' => ['name' => 'Kırıkkale']],
            ['id' => '72', 'country_id' => 1, 'tr' => ['name' => 'Batman']],
            ['id' => '73', 'country_id' => 1, 'tr' => ['name' => 'Şırnak']],
            ['id' => '74', 'country_id' => 1, 'tr' => ['name' => 'Bartın']],
            ['id' => '75', 'country_id' => 1, 'tr' => ['name' => 'Ardahan']],
            ['id' => '76', 'country_id' => 1, 'tr' => ['name' => 'Iğdır']],
            ['id' => '77', 'country_id' => 1, 'tr' => ['name' => 'Yalova']],
            ['id' => '78', 'country_id' => 1, 'tr' => ['name' => 'Karabük']],
            ['id' => '79', 'country_id' => 1, 'tr' => ['name' => 'Kilis']],
            ['id' => '80', 'country_id' => 1, 'tr' => ['name' => 'Osmaniye']],
            ['id' => '81', 'country_id' => 1, 'tr' => ['name' => 'Düzce']]
        ];

        \DB::table('localization__cities')->truncate();
        \DB::table('localization__city_translations')->truncate();

        foreach ($cities as $city) {
            $this->city->create($city);
        }
    }
}
