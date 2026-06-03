<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        News::query()->firstOrCreate(
            ['slug' => 'selamat-datang-di-immyapriadi'],
            [
                'title' => 'Selamat datang di ImMYapriadi',
                'excerpt' => 'Contoh berita pertama untuk halaman depan website sederhana ini.',
                'content' => 'Website ini sudah disiapkan dengan halaman publik, login admin, dan CRUD berita sederhana. Dari dashboard admin, konten bisa dibuat, diubah, dan dihapus tanpa perlu fitur yang rumit.',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        News::query()->firstOrCreate(
            ['slug' => 'fitur-baru-untuk-pengunjung'],
            [
                'title' => 'Fitur baru untuk pengunjung',
                'excerpt' => 'Berita kedua yang tampil di frontsite sebagai contoh konten.',
                'content' => 'Bagian depan situs menampilkan beberapa berita terbaru agar pengunjung langsung melihat informasi yang relevan. Struktur ini cocok untuk profil usaha, personal brand, atau media sederhana.',
                'is_published' => true,
                'published_at' => now(),
            ]
        );
    }
}
