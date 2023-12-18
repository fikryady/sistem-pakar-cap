<?php

namespace Database\Seeders;

use App\Models\Symptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = [
            ['nama' => 'Apabila menginfeksi insang, kerusakan dimulai dari ujung filamen insang dan merambat ke bagian pangkal, akhirnya filamen membusuk dan rontok', 'slug' => 'apabila-menginfeksi-insang,-kerusakan-dimulai-dari-ujung-filamen-insang-dan-merambat-ke bagian-pangkal,-akhirnya-filamen-membusuk-dan-rontok', 'kd' => 'G01'],
            ['nama' => 'Bengkak-bengkak di bagian tubuh (kanan/kiri)', 'slug' => '', 'kd' => 'G02'],
            ['nama' => 'Berenang ke permukaan air dan tubuhnya berwarna buram/kotor', 'slug' => 'berenang-ke-permukaan', 'kd' => 'G03'],
            ['nama' => 'Berenang tidak normal, berdiam di dasar dan akhirnya mati', 'slug' => '-erenang-tidak-normal', 'kd' => 'G04'],
            ['nama' => 'Berkumpul/mendekat ke air masuk', 'slug' => 'berkumpul/mendekat', 'kd' => 'G05'],
            ['nama' => 'Di sekeliling luka tertutup oleh pigmen berwarna kuning cerah', 'slug' => 'di-sekeliling', 'kd' => 'G06'],
            ['nama' => 'Frekuesi pernafasan meningkat dan sering meloncat-loncat', 'slug' => 'frekuensi-pernapasan', 'kd' => 'G07'],
            ['nama' => 'Gelisah dan lamban', 'slug' => 'gelisah-dan-lamban', 'kd' => 'G08'],
            ['nama' => 'Ikan mati lemas sering ditemukan di permukaan maupun dasar kolam', 'slug' => 'ikan-mati-lemas', 'kd' => 'G09'],
            ['nama' => 'Ikan mengumpul dekat saluran pembuangan', 'slug' => 'ikan-mengumpul', 'kd' => 'G10'],
            ['nama' => 'Ikan tampak kurus', 'slug' => 'ikan-tampak-kurus', 'kd' => 'G11'],
            ['nama' => 'Infeksi di sekitar mulut terlihat di selaputi benang', 'slug' => 'infeksi-di-sekitar', 'kd' => 'G12'],
            ['nama' => 'Insang berwarna kemerahan atau kecoklatan', 'slug' => 'insang-berwarna-kemerahan', 'kd' => 'G13'],
            ['nama' => 'Insang pucat atau membengkak sehingga operkulum terbuka', 'slug' => 'insang-pucat- atau-membengkak', 'kd' => 'G14'],
            ['nama' => 'Insang pucat, terdapat bercak putih dan akhirnya rusak dan membusuk', 'slug' => 'insang-pucat', 'kd' => 'G15'],
            ['nama' => 'Kematian masal bisa terjadi dalam waktu 24-48 jam', 'slug' => 'kematian-masala', 'kd' => 'G16'],
            ['nama' => 'Kulit kasat', 'slug' => 'kulit-kasar', 'kd' => 'G17'],
            ['nama' => 'kulit melepuh', 'slug' => 'kulit-melepuh', 'kd' => 'G18'],
            ['nama' => 'Lemah, kesulitan bernafas', 'slug' => 'lemah', 'kd' => 'G19'],
            ['nama' => 'Luka disekitar mulut dan bagian tubuh lainnya', 'slug' => 'luka-disekitar-mulut', 'kd' => 'G20'],
            ['nama' => 'Lukaa berwarna putih kecoklatan kemudian berkembang menjadi borok', 'slug' => 'luka-berwarna-putih', 'kd' => 'G21'],
            ['nama' => 'Mengakibatkan iritasi dan  luka pada kulit ikan karena struktur alat penempel yang keras (chitin)', 'slug' => 'mengakibatkan-iritasi', 'kd' => 'G22'],
            ['nama' => 'Mengap-mengap, lemah dan ekses mukus', 'slug' => 'mengap-mengap', 'kd' => 'G23'],
            ['nama' => 'Menggosok-gosokkan badan pada benda di sekitarnya', 'slug' => 'menggosok-gosokkan-badan', 'kd' => 'G24'],
            ['nama' => 'Menginfeksi jaringan ikat tapis insang, tulang kartilag, otot/daging dan beberapa organ dalam ikan (terutama benih)', 'slug' => 'menginfeksi-jadingan-ikat', 'kd' => 'G25'],
            ['nama' => 'Miselia (kumpulan hifa) berwarna putih', 'slug' => 'miselia', 'kd' => 'G26'],
            ['nama' => 'Nafsu makan menurun', 'slug' => 'nafsu-makan-menurun', 'kd' => 'G27'],
            ['nama' => 'Pada infeksi berat tutup insang (Operkulum) tidak dapat menutup sempurna', 'slug' => 'tutup-insang', 'kd' => 'G28'],
            ['nama' => 'Pada infeksi berat, perut lembek dan bengkak (dropsy) yang berisi cairan merah kekuningan', 'slug' => 'perut-lembek', 'kd' => 'G29'],
            ['nama' => 'Pendarahan pada pangkal sirip, ekor, sekitar anus dan bagian tubuh lainnya', 'slug' => 'pendarahana', 'kd' => 'G30'],
            ['nama' => 'Peradangan pada kulit disertai warna kemerahan pada lokasi penempelan cacing', 'slug' => 'peradangan', 'kd' => 'G31'],
            ['nama' => 'Pertumbuhan lamban', 'slug' => 'pertumbuhan-lamban', 'kd' => 'G32'],
            ['nama' => 'Produksi lendir berlebih', 'slug' => 'produksi-lendir-berlebihan', 'kd' => 'G33'],
            ['nama' => 'Produksi mukus pada insang berlebih', 'slug' => 'produksi-mukus', 'kd' => 'G34'],
            ['nama' => 'Proses gantu kulit (moulting) terhambat, dan timbul peradangan ada kulit', 'slug' => 'proses-ganti-kulit', 'kd' => 'G35'],
            ['nama' => 'Sirip ekor bengkok dan berwarna gelap', 'slug' => 'sirip-ekor', 'kd' => 'G36'],
            ['nama' => 'Sirip rusak atau rontok', 'slug' => 'sirip-rusak', 'kd' => 'G37'],
            ['nama' => 'Sisik lepas', 'slug' => 'sirip-lepas', 'kd' => 'G38'],
            ['nama' => 'Struktur tulang yang tidak normal', 'slug' => 'struktur-tulang', 'kd' => 'G39'],
            ['nama' => 'Terlihat adanya benang-benang halus menyerupai kapas yang menempel pada telur atau luka pada bagian eksternal ikan', 'slug' => 'terlihat-adanya-benang-benang', 'kd' => 'G40'],
            ['nama' => 'Terlihat benjolan putih seperti tumor berbentuk bulat-lonjong menyerupai butiran padi pada insang ikan', 'slug' => 'terlihat-benjolan', 'kd' => 'G41'],
            ['nama' => 'Tubuh berwarna gelap', 'slug' => 'tubuh-berwarna-gelap', 'kd' => 'G42'],
            ['nama' => 'Warna tubuh kusam/gelap', 'slug' => 'warna-tubuh-kusam', 'kd' => 'G43'],
            ['nama' => 'Warna tubuh pucat', 'slug' => 'warna-tubuh-pucat', 'kd' => 'G44'],
        ];

        foreach ($sample as $s) {
            $g = new Symptom;
            $g->kd = $s['kd'];
            $g->nama = $s['nama'];
            $g->slug = $s['slug'];
            $g->save();
        }
    }
}
