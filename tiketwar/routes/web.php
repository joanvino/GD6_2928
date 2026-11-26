<?php

use App\Http\Controllers\KonserController;
use Illuminate\Support\Facades\Route;

$daftarKonser = [
    1 => ['nama' => 'Coldplay - Music of the Spheres', 'kota' => 'Jakarta', 'harga' => 1500000, 'sisa' => 25, 'tanggal' => '2027-01-15' ],
    2 => ['nama' => 'NCT Dream - The Dream Show', 'kota' => 'Jakarta', 'harga' => 1200000, 'sisa' => 0, 'tanggal' => '2027-03-15' ],
    3 => ['nama' => 'Dewa 19 - Pesta Rakyat', 'kota' => 'Yogyakarta', 'harga' => 450000, 'sisa' => 120, 'tanggal' => '2029-05-10' ],
    4 => ['nama' => 'Bruno Mars - In Bandung', 'kota' => 'Bandung', 'harga' => 500000, 'sisa' => 9, 'tanggal' => '2027-12-10' ],
    5 => ['nama' => 'Lany - Soft', 'kota' => 'Semarang', 'harga' => 300000, 'sisa' => 100, 'tanggal' => '2030-11-10' ],
];

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/konser', [KonserController::class, 'index'])->name('konser.index');

Route::get('/konser/create', [KonserController::class, 'create'])

    ->name('konser.create');
Route::post('/konser', [KonserController::class, 'store'])
    ->name('konser.store');

Route::get('/konser/{id}', [KonserController::class, 'show'])
    ->whereNumber('id')->name('konser.detail');

Route::get('/konser/{id}/edit', [KonserController::class, 'edit'])
     ->whereNumber('id')->name('konser.edit');
     
Route::put('/konser/{id}', [KonserController::class, 'update'])
    ->whereNumber('id')->name('konser.update');


Route::view('/tentang', 'about')->name('tentang');

Route::get('/konser/kota/{kota}', function ($kota) use ($daftarKonser) {

    $hasil = collect($daftarKonser)->where('kota', ucfirst($kota));

    return view('konser', [
        'daftarKonser' => $hasil,
        'judul' => 'Konser di ' . ucfirst($kota),
    ]);

})->whereAlpha('kota')->name('konser.kota');

Route::view('/kontak', 'kontak')->name('kontak');