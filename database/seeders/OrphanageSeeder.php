<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrphanageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //array ini berisikan data asli panti asuhan dari nomor 1-34
        $arrayName = [
            'Panti Asuhan BJ Habibie', 'Panti Asuhan Al Kahfi', 'Panti Asuhan Al Qomariyah', 'Panti Asuhan Ibnu Hajar', 'Panti Asuhan Amanah Insan', 'Panti Asuhan Diponegoro', 'Panti Asuhan Tanwir', 'Panti Asuhan At Taqwa', 'Panti Asuhan Sejahtera', 'Panti Asuhan Muhammadiyah Kenjeran', 'Panti Asuhan Muhammadiyah Kh. Achmad Dahlan',
            'Panti Asuhan Al Amal', 'Panti Asuhan Ppay Al Amal Putri', 'Panti Asuhan Lil Wathon', 'Panti Asuhan Rodhiyatul Jannah', 'Panti Asuhan Jamiyah Muslimat Az Zahara', 'Panti Asuhan Al Ikhlas', 'Panti Asuhan Khadijah 2', 'Panti Asuhan Al Fatah', 'Panti Asuhan Mitra Arafah', 'Panti Asuhan Mahbubiyah', 'Panti Asuhan Al Ikhlas', 'Panti Asuhan Muhammadiyah Pakis', 'Panti Asuhan Muhammadiyah Putat Jaya', 'Panti Asuhan Muhammadiyah Karang Pilang', 'Panti Asuhan Putri Aisyiyah 2',
            'Panti Asuhan Yatim & Dhuafa Al Muttaqin', 'Panti Asuhan Darul Aitam Sidogiri', 'Panti Asuhan Don Bosco', 'Panti Asuhan Bani Yaqub', 'Yayasan Panti Asuhan Sejahtera', 'Panti Asuhan Yatim Cahaya Insani', 'Panti Asuhan Undaan Surabaya', 'Panti Asuhan Ada Hari Esok', 'Asrama Panti Baitul Yatim', 'Panti Asuhan Yatim Piatu Al Mu Min', 'Panti Asuhan Arief Rahman Hakim', 'Rumah Anak Pondok Kasih', 'Panti Asuhan Muhammadiyah Karangpilang', 'Panti Asuhan Ashabul Kahfi', 'Yayasan Islam Nurul Hasanah', 'Yayasan Panti Asuhan Al Ikhsan', 'Yayasan Panti Asuhan Ibma Mmyam', 'Panti Asuhan Al Mizan', 'Panti Asuhan Ibnu Sina Kertajaya', 'Panti Asuhan Muhammadiyah Medokan Ayu', 'Panti Asuhan Karya Asih', 'Panti Asuhan Pelayan Kasih', 'Panti Asuhan Sumber Kasih', 'Panti Asuhan Muhammadiyah Wiyung', 'Panti Asuhan Muslim Surabaya', 'Panti Asuhan Cinta Kasih Theresa', 'Panti Asuhan Santa Yulia', 'Panti Asuhan Al - Hasyimi', 'Panti Asuhan Yatim Ashabul Kahfi', 'Panti Asuhan Hajjah Jawiyah Badrie', 'Panti Asuhan Penerus Kasih', 'Panti Asuhan Darussalam', 'Panti Asuhan Yatim Darul Hiunah', 'Panti Asuhan Ulul Albab - Tenggilis', 'Panti Asuhan Rif atus Sholihah', 'Panti Asuhan Yatim An-Najah', 'Panti Asuhan Ar-Rochim', 'Panti Asuhan Al-Huda Karah Surabaya', 'Panti Asuhan Muhammadiyah Tandes', 'Panti Asuhan Ulul Azmi', 'Panti Asuhan Al Fatimah', 'HOH (House Of Hope) Yayasan Panti Asuhan Sejahtera', 'Yayasan Panti Asuhan Shirathal Mustaqim', 'Panti Asuhan Amanah', 'Panti Asuhan N.Kasih St. Elisabeth', 'Panti Asuhan Nuurus Salam', 'Yayasan Panti Asuhan An-nur', 'Panti Asuhan Al Hasan', 'Panti Asuhan Yatim Piatu Ar-Rohim Sambisari', 'Panti Asuhan Yatim Muhammadiyah', 'Panti Asuhan KBIK', 'Panti Asuhan Putri Assalafiyah', 'Panti Asuhan Miftahul Ulum', 'Panti Asuhan Iffatul Aliyah', 'Bala Keselamatan PIA Matahari Terbit', 'Panti Asuhan Amanah', 'Panti Asuhan Yatim Piatu Ar-Rohim Sambisar', 'Panti Asuhan Anak Yatim Rachmatulloh', 'Panti Asuhan Al Hasan', 'Panti Asuhan Muhammadiyah Gubeng', 'Panti Asuhan LPAY', 'Griya Yatim & Dhuafa Surabaya', 'Yayasan Cinta Kasih Ibu Teresa Penampungan Jompo Yatim Piatu Dan Orang Cacat', 'Panti Asuhan & Panti Jompo Bhakti Luhur', 'Panti Asuhan Lydia', 'Panti Asuhan Mitra Arafah Surabaya', 'Yayasan PPAY Al Amal', 'Yayasan Al Rosyidu Shoburih (Panti Asuhan Yatim Piatu Dan Sosial)', 'Yayasan Amanah - Panti Asuhan Yatim Piatu', 'Panti Asuhan Yatim Piatu Anak Sholeh',
        ];
        $i = 0;
        foreach (User::all()->where('user_type', 'Pengurus Panti') as $user) {
            Orphanage::factory()->create([
                'user_id' => $user->id,
                'name' => $arrayName[$i],
            ]);
            ++$i;
        }
    }
}
