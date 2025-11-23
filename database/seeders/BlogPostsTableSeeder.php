<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            // ARTIKEL 1: Edukasi & Problem Solving
            [
                'title'   => '5 Penyebab Utama Dinamo Electro Motor Cepat Panas dan Terbakar',
                'slug'    => 'penyebab-utama-dinamo-electro-motor-panas-terbakar',
                'content' => '
                    <p>Kerusakan pada <strong>electro motor</strong> seringkali menjadi mimpi buruk bagi operasional pabrik. <em>Downtime</em> produksi akibat mesin mati mendadak bisa merugikan perusahaan. Namun, tahukah Anda bahwa sebagian besar kasus "dinamo jebol" sebenarnya bisa dicegah?</p>

                    <p>Dalam pengalaman kami menangani <strong>service dinamo di Bogor</strong>, berikut adalah 5 penyebab paling umum kegagalan motor induksi:</p>

                    <h2>1. Single Phasing (Hilang Satu Fasa)</h2>
                    <p>Ini adalah pembunuh nomor satu motor 3-fasa. Kondisi ini terjadi ketika satu dari tiga saluran fasa terputus. Akibatnya, arus pada dua fasa lainnya melonjak drastis, menyebabkan panas berlebih yang menghancurkan lilitan.</p>

                    <h2>2. Overloading (Beban Berlebih)</h2>
                    <p>Memaksa motor bekerja di atas kapasitas <em>nameplate</em>-nya akan menyebabkan arus naik dan suhu lilitan meningkat. Kenaikan suhu drastis dapat memangkas umur motor secara signifikan.</p>

                    <h2>3. Ventilasi yang Buruk & Kotoran</h2>
                    <p>Debu industri atau minyak yang menumpuk pada bodi motor dapat menyumbat sirkulasi udara. Tanpa pendinginan yang baik, panas akan terperangkap di dalam. Rutinlah melakukan pembersihan atau jadwalkan <strong>General Overhaul</strong>.</p>

                    <h2>4. Masalah pada Bearing</h2>
                    <p>Bearing yang macet atau kurang pelumas akan membebani putaran rotor. Gesekan ini tidak hanya merusak as, tapi juga mengirimkan panas ke lilitan stator.</p>

                    <h2>5. Kualitas Rewinding yang Buruk</h2>
                    <p>Jika dinamo Anda pernah diservis sebelumnya, pastikan bengkel tersebut menggunakan kawat tembaga murni dan varnish berkualitas tinggi. Proses <strong>rewinding electro motor</strong> yang asal-asalan seringkali memicu korsleting.</p>

                    <hr>

                    <h3>Solusi Perbaikan Dinamo Terpercaya</h3>
                    <p>Jika electro motor di pabrik Anda menunjukkan tanda-tanda dengung kasar, bau hangus, atau panas berlebih, segera hubungi <strong>CV. Asia Tiga Utama</strong>. Kami melayani jasa service dinamo industri area Bogor dengan garansi dan standar kerja profesional.</p>
                ',
                'is_published' => true,
            ],

            // ARTIKEL 2: Komparasi (Rewinding vs Beli Baru)
            [
                'title'   => 'Rewinding vs Beli Baru: Mana yang Lebih Menguntungkan untuk Industri?',
                'slug'    => 'rewinding-dinamo-vs-beli-baru-perbandingan-biaya',
                'content' => '
                    <p>Ketika motor listrik industri rusak, manajer pabrik sering dihadapkan pada dilema: <em>Apakah sebaiknya melakukan <strong>rewinding</strong> (gulung ulang) atau membeli unit baru?</em></p>

                    <p>Keputusan ini tidak bisa diambil sembarangan. Berikut panduan singkat dari tim CV. Asia Tiga Utama untuk membantu Anda berhemat tanpa mengorbankan kualitas.</p>

                    <h2>Kapan Harus Memilih Rewinding?</h2>
                    <p>Secara umum, <strong>jasa rewinding</strong> adalah pilihan cerdas jika:</p>
                    <ul>
                        <li><strong>Ukuran Motor Besar:</strong> Untuk motor di atas 10 HP, biaya rewinding biasanya jauh lebih hemat dibanding harga baru.</li>
                        <li><strong>Motor Spesial/Langka:</strong> Jika motor Anda tipe lama yang sudah sulit dicari di pasaran atau indent lama.</li>
                        <li><strong>Kerusakan Hanya di Lilitan:</strong> Jika kondisi fisik (casing, as, rotor) masih bagus, gulung ulang akan mengembalikan performa seperti baru.</li>
                    </ul>

                    <h2>Kapan Harus Beli Baru?</h2>
                    <p>Pertimbangkan beli baru jika biaya perbaikan melebihi 60-70% harga baru, atau motor sudah terlalu tua sehingga boros listrik.</p>

                    <h3>Mengapa Rewinding di CV. Asia Tiga Utama?</h3>
                    <p>Kami menggunakan bahan isolasi kelas H (tahan panas tinggi) dan proses pencelupan varnish yang sempurna. Hasil rewinding kami seringkali memiliki ketahanan yang lebih baik dibanding motor standar.</p>
                    <p>Butuh estimasi biaya? Konsultasikan kerusakan dinamo Anda kepada kami sekarang.</p>
                ',
                'is_published' => true,
            ],

            // ARTIKEL 3: Niche Service (Generator & Overhaul)
            [
                'title'   => 'Pentingnya Megger Test dan General Overhaul pada Generator Industri',
                'slug'    => 'pentingnya-megger-test-general-overhaul-generator',
                'content' => '
                    <p>Generator (Genset) seringkali "dilupakan" karena hanya dipakai saat mati lampu. Padahal, kelembaban adalah musuh utama lilitan generator yang jarang beroperasi.</p>

                    <h2>Apa itu Megger Test?</h2>
                    <p><em>Megger Test</em> adalah prosedur wajib untuk mengetahui kesehatan isolasi kabel di dalam generator. Nilai tahanan yang rendah menandakan adanya kebocoran arus yang bisa memicu korsleting fatal saat genset dinyalakan.</p>

                    <h2>Mengapa Perlu Overhaul?</h2>
                    <p>Layanan <strong>General Overhaul</strong> di CV. Asia Tiga Utama mencakup:</p>
                    <ol>
                        <li>Pembersihan total lilitan stator dan rotor dengan chemical khusus.</li>
                        <li>Pernis ulang (re-varnishing) untuk mengembalikan kekuatan isolasi.</li>
                        <li>Penggantian bearing dan pengecekan keseimbangan as.</li>
                    </ol>

                    <p>Jangan tunggu genset meledak saat dibutuhkan. Lakukan <em>preventive maintenance</em> bersama teknisi berpengalaman kami di Bogor untuk menjaga keandalan listrik pabrik Anda.</p>
                ',
                'is_published' => true,
            ],

            // ARTIKEL 4: Fakta Teknis & Efisiensi Energi (Target: Manager Operasional)
            [
                'title'   => 'Mitos vs Fakta: Benarkah Rewinding Menurunkan Efisiensi Electro Motor?',
                'slug'    => 'mitos-fakta-rewinding-menurunkan-efisiensi-motor-listrik',
                'content' => '
                    <p>Ada anggapan lama di kalangan teknisi pabrik bahwa <em>"Motor yang sudah digulung ulang (rewinding) pasti boros listrik."</em> Apakah ini fakta atau sekadar mitos usang?</p>

                    <p>Berdasarkan studi dari <strong>EASA (Electrical Apparatus Service Association)</strong>, penurunan efisiensi pasca-rewinding memang bisa terjadi, TAPI hanya jika prosesnya dilakukan sembarangan. Mari kita bedah faktanya secara ilmiah.</p>

                    <h2>Fakta: Suhu Pembakaran adalah Kuncinya</h2>
                    <p>Saat proses pembersihan kawat lama (stripping), stator seringkali dipanaskan. Jika suhu pemanasan melebihi <strong>370°C (700°F)</strong>, struktur laminasi inti besi (core loss) akan rusak. Inilah penyebab utama motor menjadi panas dan boros listrik setelah servis.</p>

                    <h2>Standar CV. Asia Tiga Utama</h2>
                    <p>Kami menerapkan prosedur <em>Controlled Burnout Temperature</em>. Kami memastikan suhu oven tidak merusak laminasi stator. Selain itu, kami menggunakan kawat tembaga dengan konduktivitas IACS (International Annealed Copper Standard) tinggi.</p>

                    <h3>Kesimpulan</h3>
                    <p>Rewinding yang dilakukan dengan prosedur yang benar <strong>dapat mempertahankan tingkat efisiensi asli</strong> motor, bahkan dalam beberapa kasus meningkatkannya jika kami melakukan upgrade kelas isolasi. Jangan ragu melakukan rewinding, asalkan di bengkel yang mengerti standar engineering.</p>
                ',
                'is_published' => true,

            ],

            // ARTIKEL 5: Predictive Maintenance (Target: Chief Engineer)
            [
                'title'   => 'Mengapa Analisis Getaran (Vibration Analysis) Wajib untuk Mesin Rotasi?',
                'slug'    => 'pentingnya-vibration-analysis-pada-motor-industri',
                'content' => '
                    <p>Mesin industri "berbicara" sebelum mereka rusak. Bahasa mereka adalah getaran. Sayangnya, banyak industri di Indonesia yang masih menganut sistem <em>Run-to-Failure</em> (pakai sampai rusak), yang justru memakan biaya 3x lipat lebih mahal dibanding perawatan prediktif.</p>

                    <h2>Deteksi Dini Kerusakan Fatal</h2>
                    <p>Melalui analisis spektrum getaran, teknisi kami dapat mendeteksi masalah mikroskopis yang tidak terlihat mata telanjang, seperti:</p>
                    <ul>
                        <li><strong>Misalignment:</strong> Ketidaklurusan as antara motor dan beban (pompa/gearbox).</li>
                        <li><strong>Unbalance:</strong> Ketidakseimbangan massa pada rotor atau kipas.</li>
                        <li><strong>Bearing Faults:</strong> Kerusakan pada race atau ball bearing sebelum macet total.</li>
                        <li><strong>Soft Foot:</strong> Kaki motor yang tidak menapak sempurna, menyebabkan distorsi rangka.</li>
                    </ul>

                    <h2>Investasi Kecil, Penghematan Besar</h2>
                    <p>Jangan tunggu poros patah atau pondasi retak. Layanan pengecekan mekanikal di <strong>CV. Asia Tiga Utama</strong> membantu Anda menjadwalkan perbaikan di hari libur, bukan saat jam sibuk produksi.</p>
                ',
                'is_published' => true,

            ],

            // ARTIKEL 6: Upgrade Spesifikasi (Target: Industri Berat/High Temp)
            [
                'title'   => 'Upgrade Isolasi Class F ke Class H: Solusi Motor Awet di Lingkungan Panas',
                'slug'    => 'upgrade-isolasi-class-f-ke-class-h-rewinding',
                'content' => '
                    <p>Hukum fisika isolasi motor sangat kejam: <em>"Setiap kenaikan suhu operasional sebesar 10°C di atas batasnya, umur isolasi akan berkurang 50%."</em> (Hukum Arrhenius).</p>

                    <p>Banyak motor standar pabrikan hanya dibekali isolasi <strong>Class F (Max 155°C)</strong>. Jika motor Anda bekerja di area boiler, oven, atau ruang minim ventilasi, motor tersebut sedang "sekarat" perlahan.</p>

                    <h2>Solusi: Upgrade ke Class H</h2>
                    <p>Saat Anda melakukan <strong>rewinding</strong> di bengkel kami, kami menawarkan opsi upgrade material isolasi ke <strong>Class H</strong>. Material ini mampu menahan suhu hingga <strong>180°C</strong>.</p>

                    <p><strong>Keuntungan Upgrade Class H:</strong></p>
                    <ol>
                        <li>Ketahanan terhadap lonjakan beban sesaat (overload) lebih baik.</li>
                        <li>Tahan terhadap lingkungan kerja ekstrim.</li>
                        <li>Resiko <em>short circuit</em> akibat melelehnya varnish jauh lebih kecil.</li>
                    </ol>

                    <p>Konsultasikan kebutuhan upgrade spek motor Anda bersama tim engineering CV. Asia Tiga Utama.</p>
                ',
                'is_published' => true,

            ],

            // ARTIKEL 7: Musiman/Seasonal (Target: Pengelola Gedung/Mall/Pabrik saat musim hujan)
            [
                'title'   => 'Persiapan Musim Hujan: Perawatan Submersible Pump untuk Cegah Banjir',
                'slug'    => 'perawatan-submersible-pump-cegah-banjir-industri',
                'content' => '
                    <p>Menjelang musim hujan di Bogor dan Jabodetabek, pompa celup (submersible pump) menjadi garda terdepan mencegah banjir di area pabrik dan basement gedung. Namun, pompa ini seringkali gagal start justru saat air sudah mulai naik.</p>

                    <h2>Musuh Utama: Mechanical Seal Bocor</h2>
                    <p>Berbeda dengan motor biasa, submersible pump bekerja di dalam air. Komponen paling kritis adalah <strong>Mechanical Seal</strong>. Jika seal ini bocor, air akan masuk ke ruang oli dan akhirnya menembus ke ruang gulungan (stator).</p>

                    <h2>Prosedur Service Pompa di Asia Tiga Utama</h2>
                    <p>Kami tidak hanya menggulung ulang. Kami melakukan serangkaian tes ketat:</p>
                    <ul>
                        <li><strong>Pressure Test:</strong> Memastikan seal kedap tekanan.</li>
                        <li><strong>Moisture Check:</strong> Mendeteksi kelembaban pada kabel power.</li>
                        <li><strong>Impeller Balancing:</strong> Mencegah getaran yang merusak seal.</li>
                    </ul>
                    <p>Pastikan pompa dewatering Anda siap tempur. Hubungi kami untuk inspeksi pra-musim hujan.</p>
                ',
                'is_published' => true,

            ],

            // ARTIKEL 8: Chiller & Pendingin (Target: Industri F&B dan Farmasi)
            [
                'title'   => 'Bahaya Asam pada Kompresor Chiller yang Terbakar (Hermetic Motor)',
                'slug'    => 'bahaya-asam-pada-kompresor-chiller-terbakar',
                'content' => '
                    <p>Perbaikan motor kompresor pendingin (Semi-Hermetic) jauh lebih rumit dibanding motor biasa. Mengapa? Karena motor ini berendam langsung dalam refrigeran (freon) dan oli.</p>

                    <h2>Reaksi Kimia Mematikan</h2>
                    <p>Saat motor kompresor terbakar, suhu tinggi memecah struktur kimia refrigeran dan oli, menghasilkan <strong>Zat Asam (Acid)</strong>. Jika Anda hanya menggulung ulang motor tanpa membersihkan sistem, sisa asam ini akan memakan lilitan baru dalam hitungan minggu.</p>

                    <h2>Penanganan Khusus</h2>
                    <p>Di CV. Asia Tiga Utama, penanganan kompresor mencakup:</p>
                    <ul>
                        <li>Tes keasaman oli (Oil Acid Test).</li>
                        <li>Pencucian sistem dengan solvent khusus untuk menetralisir asam.</li>
                        <li>Pemakaian kawat email grade khusus yang tahan freon (Freon-proof enamel wire).</li>
                    </ul>
                    <p>Serahkan perbaikan chiller mahal Anda pada ahlinya agar tidak buang biaya dua kali.</p>
                ',
                'is_published' => true,

            ],

            // ARTIKEL 9: Troubleshooting Audio (Target: Teknisi Lapangan)
            [
                'title'   => 'Diagnosa Suara: Membedakan Dengung Listrik vs Bising Mekanik',
                'slug'    => 'cara-membedakan-suara-rusak-bearing-atau-lilitan-motor',
                'content' => '
                    <p>Bagi teknisi berpengalaman, suara motor adalah indikator kesehatan yang akurat. Namun, seringkali sulit membedakan apakah suara bising berasal dari lilitan (elektrik) atau bearing (mekanik). Salah diagnosa bisa berakibat salah penanganan.</p>

                    <h2>Trik Sederhana: "Power Cut Method"</h2>
                    <p>Bagaimana cara membedakannya? Lakukan langkah ini:</p>
                    <ol>
                        <li>Jalankan motor hingga suara bising terdengar.</li>
                        <li>Matikan aliran listrik (Cut Power) secara tiba-tiba.</li>
                        <li><strong>Dengarkan:</strong>
                            <ul>
                                <li>Jika suara bising <strong>langsung hilang</strong> saat listrik mati (sementara putaran sisa masih ada), itu adalah <strong>Masalah Elektrik</strong> (Short circuit, Single phasing, atau Air gap tidak rata).</li>
                                <li>Jika suara bising <strong>masih terdengar</strong> mengikuti putaran sisa sampai motor berhenti, itu adalah <strong>Masalah Mekanik</strong> (Bearing rusak, Unbalance, atau Fan kendor).</li>
                            </ul>
                        </li>
                    </ol>

                    <p>Apapun hasil diagnosa Anda, tim CV. Asia Tiga Utama siap melakukan perbaikan mendalam baik dari sisi elektrik maupun mekanik.</p>
                ',
                'is_published' => true,

            ],

            // ARTIKEL 10: Standardisasi & Kualitas (Target: Purchasing/Vendor Management)
            [
                'title'   => 'Mengapa "Balancing Rotor" Wajib Dilakukan Setelah Rewinding?',
                'slug'    => 'pentingnya-balancing-rotor-dinamo-industri',
                'content' => '
                    <p>Banyak bengkel dinamo pinggir jalan yang melewatkan proses ini demi menekan harga. Padahal, <strong>Dynamic Balancing</strong> adalah syarat mutlak standar ISO 1940 untuk mesin rotasi.</p>

                    <h2>Dampak Ketidakseimbangan (Unbalance)</h2>
                    <p>Saat proses perbaikan, seringkali ada sisa varnish yang menempel tidak rata pada rotor, atau penggantian kawat yang mengubah distribusi berat. Jika rotor dipasang tanpa di-balancing, gaya sentrifugal akan menciptakan getaran hebat pada kecepatan tinggi (RPM tinggi).</p>

                    <p>Dampaknya:</p>
                    <ul>
                        <li>Umur bearing berkurang drastis (bisa hancur dalam 1-2 bulan).</li>
                        <li>Konsumsi listrik meningkat karena motor bekerja lebih berat melawan getaran.</li>
                        <li>Resiko as patah (Fatigue failure).</li>
                    </ul>

                    <p>Di <strong>CV. Asia Tiga Utama</strong>, setiap pekerjaan overhaul dan rewinding yang melibatkan pelepasan rotor akan melalui proses balancing presisi di workshop kami sebelum dikembalikan ke pelanggan.</p>
                ',
                'is_published' => true,

            ],
            // ARTIKEL 11: Fokus Service Transformer/Trafo (Target: Pabrik dengan Gardu Induk)
            [
                'title'   => 'Bahaya "Sludge" pada Oli Trafo: Mengapa Purifikasi Rutin Itu Wajib?',
                'slug'    => 'jasa-purifikasi-oli-trafo-transformator-industri',
                'content' => '
                    <p>Trafo adalah komponen pasif yang sering diabaikan hingga meledak. Salah satu indikator kesehatan utama trafo adalah kondisi olinya. Seiring waktu, oksidasi oli membentuk endapan lumpur (<em>sludge</em>).</p>

                    <h2>Mengapa Sludge Berbahaya?</h2>
                    <p>Lumpur asam ini akan menempel pada kertas isolasi kumparan trafo. Akibatnya, pelepasan panas terhambat dan kertas isolasi menjadi rapuh. Jika kertas ini sobek, terjadilah <em>flashover</em> (percikan api) di dalam tangki trafo.</p>

                    <h2>Standar BDV (Breakdown Voltage) Test</h2>
                    <p>Di <strong>CV. Asia Tiga Utama</strong>, layanan perbaikan trafo kami mencakup uji tegangan tembus oli (BDV Test) sesuai standar IEC 60156. Jika nilai tegangan tembus di bawah 30kV, kami menyarankan proses <strong>Purifikasi (Oil Treatment)</strong> untuk memisahkan kandungan air dan kotoran dari oli, mengembalikan fungsi isolasinya tanpa perlu ganti oli baru sepenuhnya.</p>
                ',
                'is_published' => true,
                
            ],

            // ARTIKEL 12: Fokus Service DC Motor (Target: Industri Kertas/Plastik/Percetakan)
            [
                'title'   => 'Masalah pada Komutator DC Motor: Kapan Harus Bubut dan Undercutting?',
                'slug'    => 'perbaikan-komutator-dc-motor-carbon-brush',
                'content' => '
                    <p>Berbeda dengan motor AC, motor DC memiliki "jantung" yang sangat sensitif bernama <strong>Komutator</strong>. Komponen tembaga yang berputar ini seringkali mengalami keausan tidak rata akibat gesekan <em>Carbon Brush</em>.</p>

                    <h2>Gejala Kerusakan Komutator</h2>
                    <p>Perhatikan percikan api (<em>sparking</em>) yang berlebihan pada sikat arang. Jika dibiarkan, ini akan memicu <em>Flashover</em> ring api yang melingkar, merusak lilitan armature seketika.</p>

                    <h2>Solusi: Skimming & Undercutting</h2>
                    <p>Layanan kami mencakup pembubutan presisi (<em>Skimming</em>) untuk meratakan permukaan komutator. Setelah itu, kami melakukan teknik <strong>Undercutting</strong>, yaitu membuang sedikit lapisan mika di antara segmen tembaga agar sikat arang bisa menapak sempurna. Jangan serahkan motor DC mahal Anda ke bengkel yang tidak paham presisi mikron ini.</p>
                ',
                'is_published' => true,
                
            ],

            // ARTIKEL 13: Fokus Service Compressor (Target: Semua Industri)
            [
                'title'   => 'Kompresor Screw Overheating? Cek 3 Komponen Vital Ini',
                'slug'    => 'penyebab-kompresor-screw-panas-overheating',
                'content' => '
                    <p>Kompresor jenis Screw adalah pekerja keras di pabrik. Masalah paling umum yang kami temui di lapangan adalah <em>Overheating</em> (suhu oli di atas 100°C), yang menyebabkan mesin mati otomatis (trip).</p>

                    <h2>Investigasi Teknis:</h2>
                    <ol>
                        <li><strong>Oil Cooler Buntu:</strong> Radiator pendingin oli sering tertutup debu pabrik, menyebabkan pertukaran panas gagal.</li>
                        <li><strong>Thermostatic Valve Macet:</strong> Katup ini mengatur aliran oli ke pendingin. Jika macet, oli panas akan terus bersirkulasi tanpa didinginkan.</li>
                        <li><strong>Kualitas Oli Buruk:</strong> Oli yang sudah teroksidasi menjadi kental (varnish), menghambat putaran <em>Airend</em> (screw).</li>
                    </ol>

                    <p>Tim <strong>Mechanical Service</strong> kami siap melakukan <em>chemical cleaning</em> pada cooler dan penggantian sparepart kritikal untuk mengembalikan efisiensi kompresor Anda.</p>
                ',
                'is_published' => true,
                
            ],

            // ARTIKEL 14: Fokus Mechanical Repair (Target: Perbaikan Fisik)
            [
                'title'   => 'Restorasi As Motor: Mengapa "Metal Spraying" Lebih Baik dari Las Manual?',
                'slug'    => 'perbaikan-as-motor-aus-metal-spraying-vs-las',
                'content' => '
                    <p>Ketika dudukan bearing pada as motor (shaft) aus atau "oblak", banyak bengkel bubut biasa menyarankan untuk di-las daging lalu dibubut ulang. Hati-hati! Cara ini berbahaya.</p>

                    <h2>Bahaya Las Manual pada As (Shaft)</h2>
                    <p>Panas tinggi dari las listrik (di atas 1000°C) dapat mengubah struktur metalurgi baja as, membuatnya menjadi getas dan mudah patah saat berputar di RPM tinggi. As juga berpotensi melengkung (bending).</p>

                    <h2>Teknologi Metal Spraying</h2>
                    <p>Di <strong>CV. Asia Tiga Utama</strong>, kami menggunakan metode <em>Metal Spraying</em> (penyemprotan logam cair). Keunggulannya:</p>
                    <ul>
                        <li><strong>Cold Process:</strong> Suhu kerja relatif rendah (di bawah 100°C), sehingga as tidak akan melengkung.</li>
                        <li><strong>Ikatan Kuat:</strong> Partikel logam menyatu sempurna dengan pori-pori as dasar.</li>
                        <li><strong>Presisi:</strong> Memungkinkan kami mengembalikan ukuran toleransi bearing (ISO h7/k6) dengan sangat akurat.</li>
                    </ul>
                ',
                'is_published' => true,
                
            ],

            // ARTIKEL 15: Fokus Safety & General Repair (Target: Kepatuhan K3)
            [
                'title'   => 'Pentingnya Prosedur LOTO (Lock-Out Tag-Out) Saat Service Mesin Industri',
                'slug'    => 'standar-keselamatan-service-dinamo-loto',
                'content' => '
                    <p>Kecelakaan kerja saat perbaikan mesin sering terjadi karena mesin menyala tiba-tiba saat teknisi masih bekerja. Sebagai penyedia jasa service profesional, keselamatan adalah prioritas kami.</p>

                    <p>Kami menerapkan standar <strong>LOTO (Lock-Out Tag-Out)</strong> yang ketat:</p>
                    <ul>
                        <li><strong>Lock-Out:</strong> Mengunci sumber energi (panel breaker) dengan gembok khusus agar tidak bisa dinyalakan sembarangan.</li>
                        <li><strong>Tag-Out:</strong> Memberikan label peringatan jelas berisi nama teknisi yang sedang bekerja.</li>
                    </ul>
                    <p>Bagi perusahaan Anda yang memiliki standar K3 (HSE) tinggi, <strong>CV. Asia Tiga Utama</strong> adalah mitra service yang tepat karena kami bekerja bukan hanya dengan <em>skill</em>, tapi juga dengan prosedur keselamatan yang terstandarisasi.</p>
                ',
                'is_published' => true,
                
            ],

            // ARTIKEL 16: Fokus Varnish & Insulation (Target: Kualitas Material)
            [
                'title'   => 'Rahasia Motor Awet: Metode Pencelupan Varnish Vakum (VPI) vs Celup Biasa',
                'slug'    => 'beda-varnish-celup-dan-vakum-vpi-motor',
                'content' => '
                    <p>Setelah proses <em>rewinding</em> (gulung ulang), kumparan tembaga harus diberi lapisan pelindung (varnish/sirlak). Namun, tidak semua metode pelapisan itu sama.</p>

                    <h2>Kelemahan Metode Tuang/Celup Biasa</h2>
                    <p>Metode konvensional seringkali menyisakan rongga udara di bagian dalam alur gulungan. Udara ini bisa menjadi tempat berkumpulnya kelembaban dan menyebabkan getaran kawat yang berujung pada gesekan (short).</p>

                    <h2>Keunggulan VPI (Vacuum Pressure Impregnation)</h2>
                    <p>Kami merekomendasikan teknik yang memastikan varnish meresap hingga ke celah terdalam. Varnish mengisi seluruh rongga, mengubah kumparan menjadi satu blok solid yang keras, tahan getaran, dan kedap air. Ini adalah standar wajib untuk motor tegangan tinggi dan aplikasi <em>heavy duty</em>.</p>
                ',
                'is_published' => true,
                
            ],

            // ARTIKEL 17: Case Study / Social Proof (Target: Meyakinkan Calon Klien)
            [
                'title'   => 'Studi Kasus: Mengembalikan Performa Motor 200HP Pabrik Semen dalam 3 Hari',
                'slug'    => 'studi-kasus-perbaikan-dinamo-besar-cepat',
                'content' => '
                    <p>Waktu adalah uang. Sebuah pabrik pengolahan semen di area Bogor mengalami kerusakan fatal pada motor <em>Crusher</em> 200HP mereka. Produksi terhenti total.</p>

                    <h2>Tantangan</h2>
                    <p>Motor mengalami <em>Burnout</em> parah akibat kemacetan pada bearing yang tidak terdeteksi. Klien meminta unit kembali beroperasi dalam waktu kurang dari 96 jam.</p>

                    <h2>Solusi Asia Tiga Utama</h2>
                    <p>Tim kami bekerja dengan sistem <em>shift</em> 24 jam non-stop:</p>
                    <ol>
                        <li><strong>Jam 0-12:</strong> Stripping kawat lama dan pembersihan stator.</li>
                        <li><strong>Jam 12-48:</strong> Rewinding menggunakan kawat double-glass insulation grade H.</li>
                        <li><strong>Jam 48-60:</strong> Varnishing dan pengeringan oven.</li>
                        <li><strong>Jam 60-72:</strong> Penggantian bearing SKF original, assembly, dan pengetesan beban.</li>
                    </ol>

                    <p>Hasilnya, motor dikirim kembali dan terpasang sebelum batas waktu, dengan nilai ampere dan getaran yang kembali normal seperti baru. Butuh layanan <em>Emergency</em>? Simpan nomor kami sekarang.</p>
                ',
                'is_published' => true,
                
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }

        // You can add media later via Filament admin panel
    }
}
