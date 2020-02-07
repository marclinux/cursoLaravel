<?php

use Illuminate\Database\Seeder;
use App\Site_type;
use App\Site;
use App\Comment;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Site_type::class, 50)->create();
        $tipo = Site_type::create(['name' => 'Oficina central', 'active' => true]);
        $tipo = Site_type::create(['name' => 'Oficina de zona', 'active' => true]);
        $tipo = Site_type::create(['name' => 'Sucursal', 'active' => true]);
        $tipo = Site_type::create(['name' => 'Sitio de interes', 'active' => true]);
        $tipo = Site_type::create(['name' => 'Toma de datos', 'active' => true]);
        $sitio = Site::create(['name' => 'Tuxtla Gutierrez', 'active' => 1, 'type_id' => 1,'lat' => 16.7628498077393, 'long' => -93.1001205444336]);
        $sitio = Site::create(['name' => 'Mercado de los Ancianos', 'active' => 1, 'type_id' => 2,'lat' => 16.7450389862061, 'long' => -93.106559753418]);
        $sitio = Site::create(['name' => 'Oficina Sur Oriente', 'active' => 1, 'type_id' => 3,'lat' => 16.748950958252, 'long' => -93.1071701049805]);
        $sitio = Site::create(['name' => 'El Parral', 'active' => 1, 'type_id' => 4,'lat' => 16.358850479126, 'long' => -92.9773941040039]);
        $comment = Comment::create(['texto' => 'Oficina principal', 'fecha' => '2020-01-01', 'active' => 1, 'site_id' => 1]);
        $comment = Comment::create(['texto' => 'Personal calificado', 'fecha' => '2020-01-03', 'active' => 1, 'site_id' => 1]);
        $comment = Comment::create(['texto' => 'Excelente atencion', 'fecha' => '2020-01-05', 'active' => 1, 'site_id' => 2]);
        $comment = Comment::create(['texto' => 'Falta de personal', 'fecha' => '2020-01-05', 'active' => 1, 'site_id' => 3]);
        $comment = Comment::create(['texto' => 'No tienen papeleria', 'fecha' => '2020-01-07', 'active' => 1, 'site_id' => 4]);
        $comment = Comment::create(['texto' => 'Oficina desconocida', 'fecha' => '2020-01-10', 'active' => 1, 'site_id' => 4]);
    }
}
