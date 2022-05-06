<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach([
            "Abdul Latif, SE.M.Si",
            "Alvons Habibie, S.Pd.,M.Pd.",
            "Arfan Nusi, M.Fil.I",
            "Asral Kelvin Sahrain, SE., MM",
            "Azhar J. Habu, SE., MM",
            "Bakri, SE., M.Ak",
            "Chitra Yuliasri Katili, M.Acc",
            "Dr. A. Jufri, M.Fil.I",
            "Dr. Andi Mardiana, SE.M.Si",
            "Dr. Asna Usman Dilo, M.Pd",
            "Dr. H.Dulsukmi Kasim, Lc., M.HI",
            "Dr. Hj. Sri Dewi Yusuf,SE.MM",
            "Dr. Luqmanul H. Ajuna, SE.I.,MM",
            "Dr. Muhdar HM. ST.,SE., MM",
            "Dr. Muhibbuddin S.Ag., M.Si",
            "Dr. Sofhian,SE.I., MA",
            "Dr. Sophian AP. Kau, M.Ag",
            "Dr. Syawaluddin, M.Si",
            "Dr. Yusran Zainuddin, MM",
            "Dr. Zohra Yasin, MH.",
            "Dr.Roni Mohamad, SE.M.Si",
            "Drs. H. Ismail Puhi, MA",
            "Eka Purnama, S.Si., M.Si",
            "Fahreza Olii, SH",
            "Fathur Khair, M.E.",
            "Fauziah Husain, S.Pd., M.Ak",
            "Gifari Bachmid, SE., ME",
            "Hendra Dukalang, S.Pd.,M.Si",
            "Hj. Musdalifa Abu Samad, Lc., M.Pd.I",
            "Immawan Muhajir Kadim, S.HI., M.EI ",
            "Ita Meiarni, M.Pd",
            "Juniati Ismail, SE., M.Si",
            "Khairul Asfar, Lc., M.TH.I",
            "Laras Ayu Sekarrini, SE.,  ME",
            "Mahfidzah, SE., M.Ak",
            "Mei K. Abdullah, SE., M.Ak",
            "Mitra Riani Aisyah, ST.,MM",
            "Moh. Agus Nugroho, SE.I.,M.E.",
            "Moh. Anwar Thalib, SE., MSA",
            "Muh. Ardi, SE., M.Si",
            "Nurafifah Bugi, SE.I.,M.E",
            "Nurul Fadhilah, SE., M.Ek",
            "Rahmatia, SE., M.Ak",
            "Rifadli Kadir, SE.I., M.Ek",
            "Setia Ningsih M.Si.",
            "Sri Apriyanti Husain, SE., MSA",
            "Suci Larasati, SE., M.SM",
            "Suharia, M.Pd.",
            "Supandi Rahman, SE.,M.Ak",
            "Vindi Paputungan, S.Pd., M.Sc",
            "Wahyudi Rusdi., SSi.,M.Si.",
            "Wiwin Koni, SE.I., MSA",
            "Yulia Puspitasari Gobel, M.Sc",
        ] as $key => $value) {
            Dosen::create([
                'nama' => $value,
                'nip' => '123'.$key,
                'bidang_studi' => '-',
            ]);
        }
    }
}
