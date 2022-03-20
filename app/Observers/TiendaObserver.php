<?php

namespace App\Observers;

use App\Models\Sistema\Tienda;

class TiendaObserver
{
    /**
     * Handle the Tienda "created" event.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return void
     */
    public function created(Tienda $tienda)
    {
        //
    }

    /**
     * Handle the Tienda "updated" event.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return void
     */
    public function updated(Tienda $tienda)
    {
      session(['tienda' => $tienda]);
    }

    /**
     * Handle the Tienda "deleted" event.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return void
     */
    public function deleted(Tienda $tienda)
    {
        //
    }

    /**
     * Handle the Tienda "restored" event.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return void
     */
    public function restored(Tienda $tienda)
    {
        //
    }

    /**
     * Handle the Tienda "force deleted" event.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return void
     */
    public function forceDeleted(Tienda $tienda)
    {
        //
    }
}
