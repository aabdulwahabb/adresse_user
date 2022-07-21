<?php

namespace Database\Seeders;

use App\Models\AdresseRolle;
use App\Models\DeliveryNote;
use App\Models\DeliveryNotePosition;
use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptPosition;
use App\Models\Invoice;
use App\Models\InvoicePosition;
use App\Models\OrderPosition;
use App\Models\StorageBin;
use App\Models\StorageBinContent;
use App\Models\Order;
use App\Models\OrderReturn;
use App\Models\Project;
use App\Models\Storage;
use App\Models\Team;
use App\Models\TracyUser;
use App\Models\Item;
use App\Models\Adresse;
use App\Models\User;
use App\Models\UserRight;
use App\Models\XentralUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!app()->environment('production')) {

            // Create some random stuff
            TracyUser::factory(5)->create();
            Item::factory(20)->create();
            Project::factory(5)->create();
            Order::factory(50)
                ->has(OrderPosition::factory()->item()->count(2),'orderPositions')
                ->create();
            DeliveryNote::factory(25)
                ->has(DeliveryNotePosition::factory()->item()->count(2), 'deliveryNotePositions')
                ->order()
                ->create();
            Invoice::factory(15)
                ->has(InvoicePosition::factory()->item()->count(2), 'invoicePositions')
                ->order()
                ->create();

            GoodsReceipt::factory(15)
                ->has(GoodsReceiptPosition::factory()->item()->count(5), 'goodsReceiptPositions')
                ->create();

            OrderReturn::factory(50)->create();

            // Create some storagespaces with bins
            Storage::factory(3)
                ->has(StorageBin::factory()->count(15), 'storageBins')
                ->create();

            // Fill bins with random items
            StorageBinContent::factory(100)
                ->storageBin()
                ->item()
                ->create();

            // Create some partslists

            Item::factory(10)
                ->has(Item::factory()->count(3), 'children')
                ->create([
                    'lagerartikel' => 0,
                    'stueckliste' => 1,
                    'juststueckliste' => 1,
                ]);



            // Create some deleted Items
            Item::factory(5)

                ->create([
                    'nummer' => 'DEL'
                ]);

            // Create an admin user
            TracyUser::factory()->create([
                'email' => 'admin@versandmanufaktur.de',
                'is_admin' => 1,
                ]);

                // Create an Adresse
                Adresse::factory(5)
                    ->has(XentralUser::factory()->count(2), 'user')
                    ->has(AdresseRolle::factory()->count(2), 'adresseRolle')
                    ->create();

                    // Create an Adresse
                    XentralUser::factory(5)
                        ->has(Adresse::factory()->count(1), 'adresse')
                        ->has(UserRight::factory()->count(3), 'userright')
                        ->create();

                    //Create Teams
                    Team::factory(5)
                        ->create();

            User::factory()->create([
                'name'    => 'Abdulwahab Alhasan',
                'username'    => 'aalhasan',
                'email'    => 'abdul@gmail.com',
                'email_verified_at'    => now(),
                'is_admin'    => 1,
                'password' => '',
                'repassword' => 0,
                'passwordhash' => Hash::make('qwqwqwqw'),
                'passwordmd5' => Str::random(40),
                'passwordsha512' => Str::random(40),
                'salt' => Str::random(40),
                'remember_token' => Str::random(40),
            ]);
        }
    }
}
