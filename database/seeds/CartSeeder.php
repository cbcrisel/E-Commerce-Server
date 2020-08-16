<?php

use Illuminate\Database\Seeder;
use App\Cart;
use Carbon\Carbon;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart=new Cart();
        $cart->status="Vacio";
        $cart->user_id=1;
        $cart->created_at=Carbon::now();
        $cart->save();
    }
}
