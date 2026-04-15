<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Abia' => ['Aba', 'Umuahia', 'Ohafia', 'Arochukwu', 'Isuochi', 'Okpuala Ngwa', 'Amaeke', 'Item', 'Nkporo', 'Abiriba'],
            'Adamawa' => ['Yola', 'Mubi', 'Numan', 'Ganye', 'Jimeta', 'Fufore', 'Mayo-Belwa', 'Girei', 'Toungo', 'Michika'],
            'Akwa Ibom' => ['Uyo', 'Eket', 'Ikot Ekpene', 'Oron', 'Abak', 'Etinan', 'Ibeno', 'Ikot Abasi', 'Mkpat Enin', 'Nsit Ubium'],
            'Anambra' => ['Awka', 'Onitsha', 'Nnewi', 'Ekwulobia', 'Agulu', 'Enugwu-Ukwu', 'Igbo-Ukwu', 'Ozubulu', 'Oba', 'Ogidi'],
            'Bauchi' => ['Bauchi', 'Azare', 'Jamaare', 'Misau', 'Darazo', 'Tafawa Balewa', 'Ningi', 'Dass', 'Bogoro', 'Alkaleri'],
            'Bayelsa' => ['Yenagoa', 'Brass', 'Sagbama', 'Ogbia', 'Nembe', 'Ekeremor', 'Amassoma', 'Kaiama', 'Twon-Brass', 'Oporoma'],
            'Benue' => ['Makurdi', 'Otukpo', 'Gboko', 'Katsina-Ala', 'Ugbokpo', 'Adikpo', 'Vandeikya', 'Aliade', 'Okpoga', 'Oju'],
            'Borno' => ['Maiduguri', 'Biu', 'Gwoza', 'Damboa', 'Marte', 'Konduga', 'Bama', 'Monguno', 'Gubio', 'Mafa'],
            'Cross River' => ['Calabar', 'Ikom', 'Ogoja', 'Obudu', 'Ugep', 'Akamkpa', 'Obubra', 'Boki', 'Etung', 'Yakurr'],
            'Delta' => ['Asaba', 'Warri', 'Sapele', 'Ughelli', 'Agbor', 'Oleh', 'Burutu', 'Koko', 'Ozoro', 'Kwale'],
            'Ebonyi' => ['Abakaliki', 'Afikpo', 'Onueke', 'Ezzamgbo', 'Nguzu Edda', 'Isu', 'Okposi', 'Onicha', 'Amasiri', 'Effium'],
            'Edo' => ['Benin City', 'Auchi', 'Uromi', 'Ekpoma', 'Irrua', 'Sabongida-Ora', 'Opoji', 'Igarra', 'Okada', 'Ewohimi'],
            'Ekiti' => ['Ado-Ekiti', 'Ilawe-Ekiti', 'Ise-Ekiti', 'Ikere-Ekiti', 'Oye-Ekiti', 'Efon-Alaaye', 'Aramoko-Ekiti', 'Emure-Ekiti', 'Ikole-Ekiti', 'Ido-Ekiti'],
            'Enugu' => ['Enugu', 'Nsukka', 'Awgu', 'Udi', 'Oji River', 'Agbani', 'Ezeagu', 'Igbo-Etiti', 'Uzo-Uwani', 'Nkanu'],
            'FCT' => ['Abuja', 'Gwagwalada', 'Kuje', 'Bwari', 'Kubwa', 'Garki', 'Maitama', 'Wuse', 'Nyanya', 'Karu'],
            'Gombe' => ['Gombe', 'Billiri', 'Kumo', 'Deba', 'Kaltungo', 'Pindiga', 'Bajoga', 'Dukku', 'Funakaye', 'Yamaltu'],
            'Imo' => ['Owerri', 'Orlu', 'Okigwe', 'Mbaise', 'Oguta', 'Ohaji', 'Egbema', 'Ideato', 'Ihitte-Uboma', 'Obowo'],
            'Jigawa' => ['Dutse', 'Hadejia', 'Birnin Kudu', 'Gumel', 'Kazaure', 'Babura', 'Sule Tankarkar', 'Gwaram', 'Ringim', 'Garki'],
            'Kaduna' => ['Kaduna', 'Zaria', 'Kafanchan', 'Saminaka', 'Kagoro', 'Giwa', 'Makera', 'Ikara', 'Jema\'a', 'Birnin Gwari'],
            'Kano' => ['Kano', 'Wudil', 'Bichi', 'Gaya', 'Rano', 'Karabude', 'Kunchi', 'Sumaila', 'Takai', 'Dambatta'],
            'Katsina' => ['Katsina', 'Daura', 'Funtua', 'Malumfashi', 'Dutsin-Ma', 'Bakori', 'Zango', 'Kankia', 'Mani', 'Sandamu'],
            'Kebbi' => ['Birnin Kebbi', 'Argungu', 'Yauri', 'Jega', 'Zuru', 'Kamba', 'Bagudo', 'Danko-Wasagu', 'Sakaba', 'Fakai'],
            'Kogi' => ['Lokoja', 'Okene', 'Idah', 'Kabba', 'Ankpa', 'Dekina', 'Egbe', 'Mopa', 'Isanlu', 'Ogaminana'],
            'Kwara' => ['Ilorin', 'Offa', 'Omu-Aran', 'Share', 'Patigi', 'Kaiama', 'Lafiagi', 'Ajase-Ipo', 'Ilesha-Baruba', 'Okuta'],
            'Lagos' => ['Lagos', 'Ikeja', 'Badagry', 'Epe', 'Ikorodu', 'Mushin', 'Ojo', 'Alimosho', 'Surulere', 'Victoria Island'],
            'Nasarawa' => ['Lafia', 'Keffi', 'Akwanga', 'Karu', 'Nasarawa', 'Doma', 'Wamba', 'Toto', 'Obi', 'Eggon'],
            'Niger' => ['Minna', 'Bida', 'Suleja', 'Kontagora', 'New Bussa', 'Mokwa', 'Rijau', 'Lapai', 'Agaie', 'Jebba'],
            'Ogun' => ['Abeokuta', 'Ijebu Ode', 'Sagamu', 'Ilaro', 'Ota', 'Ifo', 'Ikenne', 'Owode', 'Agbara', 'Odogbolu'],
            'Ondo' => ['Akure', 'Ondo City', 'Owo', 'Ikare', 'Okitipupa', 'Idanre', 'Igbokoda', 'Ore', 'Akungba', 'Arigidi'],
            'Osun' => ['Osogbo', 'Ile-Ife', 'Ilesa', 'Ede', 'Iwo', 'Ikire', 'Ejigbo', 'Gbongan', 'Oke-Ila', 'Ipetu-Ijesha'],
            'Oyo' => ['Ibadan', 'Oyo', 'Ogbomoso', 'Iseyin', 'Saki', 'Fiditi', 'Eruwa', 'Igbo-Ora', 'Kishi', 'Awe'],
            'Plateau' => ['Jos', 'Bukuru', 'Pankshin', 'Shendam', 'Langtang', 'Vom', 'Barkin Ladi', 'Mangu', 'Wase', 'Kanke'],
            'Rivers' => ['Port Harcourt', 'Portharcourt', 'Buguma', 'Eleme', 'Ahoada', 'Omoku', 'Bori', 'Okrika', 'Degema', 'Opobo'],
            'Sokoto' => ['Sokoto', 'Gwadabawa', 'Tambuwal', 'Wamako', 'Binji', 'Gudu', 'Illela', 'Rabah', 'Sabon Birni', 'Shagari'],
            'Taraba' => ['Jalingo', 'Wukari', 'Bali', 'Gembu', 'Ibi', 'Mutum Biyu', 'Takum', 'Zing', 'Lau', 'Karim Lamido'],
            'Yobe' => ['Damaturu', 'Potiskum', 'Gashua', 'Nguru', 'Geidam', 'Buni Yadi', 'Fika', 'Gujba', 'Yunusari', 'Bade'],
            'Zamfara' => ['Gusau', 'Kaura Namoda', 'Anka', 'Talata Mafara', 'Maru', 'Tsafe', 'Shinkafi', 'Bukkuyum', 'Bungudu', 'Gummi'],
        ];

        // Fetch all states at once and key them by their names for quick lookup
        $states = State::all()->keyBy('name');
        
        $citiesToInsert = [];

        foreach ($data as $stateName => $cities) {
            // Ensure the state exists in the database before attaching cities
            if ($states->has($stateName)) {
                $stateId = $states[$stateName]->id;
                
                foreach ($cities as $cityName) {
                    $citiesToInsert[] = [
                        'title' => $cityName,
                        'state_id' => $stateId,
                        'slug' => Str::slug($cityName),     
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // Insert all cities in chunks to prevent memory limits if the list gets larger
        foreach (array_chunk($citiesToInsert, 100) as $chunk) {
            City::insert($chunk);
        }
    }
}