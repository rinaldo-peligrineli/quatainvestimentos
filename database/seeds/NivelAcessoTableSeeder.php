<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario\NivelAcesso;

class NivelAcessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('nivel_acesso')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $niveis_acesso = [
            ['nivel_acesso' => 'básico', 'status' => '1'], 
            ['nivel_acesso' => 'admin', 'status' => '1'],
            ['nivel_acesso' => 'desenvolvedor', 'status' => '1'],
        ];    

        foreach($niveis_acesso as $nivel_acesso) {
            NivelAcesso::create(
                [
                 'nivel_acesso' => $nivel_acesso['nivel_acesso'], 
                 'status' => $nivel_acesso['status'],    
                ]
            );

        }
    }
}
