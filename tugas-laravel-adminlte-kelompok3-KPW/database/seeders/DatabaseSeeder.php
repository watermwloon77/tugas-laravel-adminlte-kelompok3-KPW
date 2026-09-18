<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ==================================================================
        // 1. DATA ROLE (admin, kasir, owner)
        // ==================================================================
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $kasirRole = Role::firstOrCreate(['name' => 'kasir']);
        $ownerRole = Role::firstOrCreate(['name' => 'owner']);

        // ==================================================================
        // 2. DATA USER DEFAULT (password semua: password)
        // ==================================================================
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Administrator Toko',
                'password' => Hash::make('password'),
                'role_id'  => $adminRole->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'kasir@gmail.com'],
            [
                'name'     => 'Kasir Toko Buket',
                'password' => Hash::make('password'),
                'role_id'  => $kasirRole->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'owner@gmail.com'],
            [
                'name'     => 'Owner / Pemilik Toko',
                'password' => Hash::make('password'),
                'role_id'  => $ownerRole->id,
            ]
        );

        // ==================================================================
        // 3. DATA KATEGORI BUKET
        // ==================================================================
        $katMawar  = Category::firstOrCreate(['nama' => 'Buket Bunga Mawar']);
        $katSnack  = Category::firstOrCreate(['nama' => 'Buket Snack & Cokelat']);
        $katUang   = Category::firstOrCreate(['nama' => 'Buket Uang']);

        // ==================================================================
        // 4. DATA PRODUK BUKET (nama produk unik per kategori via kode)
        // ==================================================================
        $products = [
            // ---- Buket Bunga Mawar ----
            [
                'kode_produk' => 'MWR-001',
                'nama_produk' => 'Buket Mawar Merah Premium',
                'category_id' => $katMawar->id,
                'harga_beli'  => 85000,
                'harga_jual'  => 150000,
                'stok'        => 25,
            ],
            [
                'kode_produk' => 'MWR-002',
                'nama_produk' => 'Buket Mawar Putih & Baby\'s Breath',
                'category_id' => $katMawar->id,
                'harga_beli'  => 95000,
                'harga_jual'  => 175000,
                'stok'        => 18,
            ],
            [
                'kode_produk' => 'MWR-003',
                'nama_produk' => 'Buket Mawar Pink Soft (20 Tangkai)',
                'category_id' => $katMawar->id,
                'harga_beli'  => 105000,
                'harga_jual'  => 190000,
                'stok'        => 15,
            ],
            [
                'kode_produk' => 'MWR-004',
                'nama_produk' => 'Buket Mawar Campur Pelangi (30 Tangkai)',
                'category_id' => $katMawar->id,
                'harga_beli'  => 135000,
                'harga_jual'  => 250000,
                'stok'        => 10,
            ],
            // ---- Buket Snack & Cokelat ----
            [
                'kode_produk' => 'SNK-001',
                'nama_produk' => 'Buket Snack Happy Birthday',
                'category_id' => $katSnack->id,
                'harga_beli'  => 120000,
                'harga_jual'  => 200000,
                'stok'        => 20,
            ],
            [
                'kode_produk' => 'SNK-002',
                'nama_produk' => 'Buket Cokelat Silverqueen (Mini)',
                'category_id' => $katSnack->id,
                'harga_beli'  => 90000,
                'harga_jual'  => 165000,
                'stok'        => 22,
            ],
            [
                'kode_produk' => 'SNK-003',
                'nama_produk' => 'Buket Snack Jumbo (Isi 15 Item)',
                'category_id' => $katSnack->id,
                'harga_beli'  => 180000,
                'harga_jual'  => 300000,
                'stok'        => 8,
            ],
            [
                'kode_produk' => 'SNK-004',
                'nama_produk' => 'Buket Cokelat Waffer & Keju (Kotak)',
                'category_id' => $katSnack->id,
                'harga_beli'  => 70000,
                'harga_jual'  => 130000,
                'stok'        => 16,
            ],
            // ---- Buket Uang ----
            [
                'kode_produk' => 'UNG-001',
                'nama_produk' => 'Buket Uang 500 Ribu (Stick)',
                'category_id' => $katUang->id,
                'harga_beli'  => 650000,
                'harga_jual'  => 750000,
                'stok'        => 6,
            ],
            [
                'kode_produk' => 'UNG-002',
                'nama_produk' => 'Buket Uang 1 Juta (Besek)',
                'category_id' => $katUang->id,
                'harga_beli'  => 1150000,
                'harga_jual'  => 1250000,
                'stok'        => 4,
            ],
            [
                'kode_produk' => 'UNG-003',
                'nama_produk' => 'Buket Uang Koin 100 Ribu (Kado)',
                'category_id' => $katUang->id,
                'harga_beli'  => 175000,
                'harga_jual'  => 260000,
                'stok'        => 9,
            ],
        ];

        $productIds = [];
        foreach ($products as $p) {
            // firstOrCreate: tidak mereset stok jika seeder dijalankan ulang
            $product = Product::firstOrCreate(
                ['kode_produk' => $p['kode_produk']],
                $p
            );
            $productIds[$product->kode_produk] = $product->id;
        }

        // ==================================================================
        // 5. SAMPEL DATA TRANSAKSI PENJUALAN + DETAIL
        // ==================================================================
        $kasirUser = User::where('email', 'kasir@gmail.com')->first();

        $noNota   = 'NT-' . date('Ymd') . '-0001';
        $barang1  = Product::where('kode_produk', 'MWR-001')->first();
        $barang2  = Product::where('kode_produk', 'SNK-001')->first();

        $penjualan = Penjualan::firstOrCreate(
            ['no_nota' => $noNota],
            [
                'tanggal'     => now(),
                'total_harga' => ($barang1->harga_jual * 1) + ($barang2->harga_jual * 2),
                'bayar'       => 600000,
                'kembalian'   => 600000 - (($barang1->harga_jual * 1) + ($barang2->harga_jual * 2)),
                'user_id'     => $kasirUser->id ?? null,
            ]
        );

        if ($penjualan->details()->count() === 0) {
            $items = [
                ['product' => $barang1, 'qty' => 1],
                ['product' => $barang2, 'qty' => 2],
            ];

            foreach ($items as $item) {
                $product = $item['product'];
                $qty     = $item['qty'];

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'product_id'   => $product->id,
                    'qty'          => $qty,
                    'harga_beli'   => $product->harga_beli,
                    'harga_jual'   => $product->harga_jual,
                    'subtotal'     => $product->harga_jual * $qty,
                ]);

                $product->decrement('stok', $qty);
            }
        }

        $this->command->info('Seeder berhasil dijalankan: Roles, Users, Kategori, Produk & Transaksi Sampel sudah dibuat.');
    }
}