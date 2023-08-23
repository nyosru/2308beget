<?php

namespace App\Observers;

use App\Http\Controllers\TelegramController;
use App\Models\Domain;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DomainObserver
{
    /**
     * Handle the Domain "created" event.
     */
    public function created(Domain $domain): void
    {
        //
    }

    /**
     * Handle the Domain "updated" event.
     */
    public function updated(Domain $domain): void
    {
//        dd($domain->getChanges());
//        dd($domain->getOriginal());

        // при оплате бонусом
        if (
            empty($domain->getOriginal()['bonus_id'])
            && !empty($domain->getChanges()['bonus_id'])
        ) {
//            dd('да, это обновление');

            // сообщение об оплате
            TelegramController::sendMsgToUser(Auth::user(), '🍀 ' . $domain->getOriginal()['name'] . ' Наблюдение за доменом оплачено бонусом');
        }

    }

    /**
     * Handle the Domain "deleted" event.
     */
    public function deleted(Domain $domain): void
    {
        //
    }

    /**
     * Handle the Domain "restored" event.
     */
    public function restored(Domain $domain): void
    {
        //
    }

    /**
     * Handle the Domain "force deleted" event.
     */
    public function forceDeleted(Domain $domain): void
    {
        //
    }
}
