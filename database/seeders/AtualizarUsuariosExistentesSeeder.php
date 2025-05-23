<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AtualizarUsuariosExistentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::limit(2)->get(); // Obtém os dois primeiros usuários existentes

        foreach ($users as $user) {
            if ($user->name === null) {
                $user->name = 'Nome Padrão ' . $user->id; // Defina um nome padrão
            }
            if ($user->email === null) {
                $user->email = 'usuario' . $user->id . '@exemplo.com'; // Defina um email padrão
            }
            if ($user->password === null) {
                $user->password = Hash::make('password'); // Defina uma senha padrão ('password')
            }
            if ($user->email_verified_at === null) {
                $user->email_verified_at = now(); // Marque como verificado (opcional)
            }
            // Adicione outras verificações e valores padrão para outros campos nulos, se necessário

            $user->save();
        }

        $this->command->info('Campos nulos dos dois primeiros usuários foram atualizados.');
    }
}