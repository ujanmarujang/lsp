<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdminUser extends Command
{
    protected $signature = 'make:admin {email} {password} {name=Admin}';

    protected $description = 'Buat akun admin untuk Filament';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        if (User::where('email', $email)->exists()) {
            $this->error('User dengan email ini sudah ada!');

            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("✅ Admin berhasil dibuat dengan email: $email");
    }
}