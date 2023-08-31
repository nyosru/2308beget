<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TelegramController;
use App\Models\Bonus;
use App\Models\Domain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     */

    /**
     * перевод домен а в неактивное состояние
     * @param Domain $id
     * @return void
     */
    public function deactive(Domain $domain)
    {

        try {

            $user = Auth::user()->id;

            // владелец домена наш чувак
            if ($domain->user_id == Auth::user()->id) {
                $domain->show = false;
                $domain->save();

                return redirect('/')
                    ->with('domain_status', 'Домен удалён из активного списка! (виден в неактивном списке доменов)');
            }
//        // владелец домена НЕ наш чувак
//        else { dd(__LINE__); }
        } catch (\Exception $ex) {
        }

        return redirect('/')
            ->with('domain_warning', 'что то пошло не так');

    }

    public function domainNameBuyBonus(string $domain_name)
    {
        $domain = Domain::whereName($domain_name)->whereUser_id(Auth::user()->id)->first();
        return self::domainBuyBonus($domain);
    }

    public static function domainBuyBonus(Domain $domain)
    {

        try {

            $user = Auth::user()->id;

            // владелец домена наш чувак
            if ($domain->user_id == Auth::user()->id) {

                // ищем бонусы есть лиы
                $bonuses = Bonus::whereUser_id(Auth::user()->id)
                    ->where('kolvo', '>', 'potracheno')
                    ->firstOrFail();

                // списали у пользователя
                $user = User::whereId(Auth::user()->id)->first();
                $user->decrement('bonus');
                $user->save();

                $domain->bonus_id = $bonuses->id;
                $domain->payed_do = date('Y-m-d', $_SERVER['REQUEST_TIME'] + 5 * 364 * 24 * 3600);
                $domain->save();

                $bonuses->increment('potracheno', 1);
                $bonuses->save();

                return redirect('/')
                    ->with('domain_status', 'Наблюдение за ' . $domain->name . ' оплачено бонусом, наблюдаем и оповестим как домен будет доступен к регистрации');
            }
//        // владелец домена НЕ наш чувак
        } catch (\Exception $ex) {
//            dd($ex);
            return redirect('/')
                ->with('domain_warning', 'Упс, ошибочка');
        }

        return redirect('/')
            ->with('domain_warning', 'что то пошло не так');

    }


    public function domain_add(Request $request)
    {

        $add = Domain::create([
            'name' => $request->domain,
            'user_id' => Auth::user()->id
        ]);

//        dd($add);

        return redirect('/')
            //->route('domain_enter')
            ->with('domain_status', 'Домен добавлен!')
            ->with('button_buy', 'da')
            ->with('domain', $request->domain);
    }

//    public function index()
//    {
//        $in = [
//            'BOT_USERNAME' => 'WaitingDomainBot',
//            'BOT_TOKEN' => env('bot_token'),
//            'REDIRECT_URI' => 'https://' . $_SERVER['HTTP_HOST'] . '/api/telega-auth/callback',
//            'HTTP_HOST' => $_SERVER['HTTP_HOST']
//        ];
//
//        if( Auth::check() ) {
//            $in['user'] = Auth::user();
////        $in['domains'] = Domain::all();
//            $in['domains'] = Domain::with('pays')->where('user_id', Auth::user()->id)
//                ->get();
//        }
//
//        return view('domain.index', $in);
//    }

    public function backwordSend(Request $request)
    {

        TelegramController::send('сообщение из обратной связи доменонаблюдателя:' . PHP_EOL . $request->text);

        return redirect()
            ->route('domain_backword')
//            ->action([DomainController::class, 'backword'])
            ->with('status', 'Сообщение отправлено!');
    }

    public function backword()
    {

        $in = [];

        if (Auth::check()) {
            $in['user'] = Auth::user();
//            $in['bonuses'] = Bonus::whereUser_id($in['user']->id)->addSelect(db::raw('sum(Bonuses.kolvo) as kolvos'))->get()[0];
            $in['user_info'] = DomainLkController::UserInfo($in['user']->id);
        }
        return view('domain.backword', $in);
    }

    public function index()
    {

        $in = [
//            'BOT_USERNAME' => 'WaitingDomainBot',
            'BOT_USERNAME' => env('bot_token_name'),
            'BOT_TOKEN' => env('bot_token'),
            'REDIRECT_URI' => 'https://' . $_SERVER['HTTP_HOST'] . '/api/telega-auth/callback',
            'HTTP_HOST' => $_SERVER['HTTP_HOST']
        ];

        if (Auth::check()) {

            $in['user'] = Auth::user();
//            $in['bonuses'] = Bonus::whereUser_id($in['user']->id)->addSelect(db::raw('sum(Bonuses.kolvo) as kolvos'))->get()[0];

            $in['user_info'] = DomainLkController::UserInfo($in['user']->id);

            $in['domains'] = Domain::with(['pays',
                'whois' => function ($query) {
//                    $query->orderBy('created_at', 'desc');
                    $query->limit(1);
                },
                'whois2' => function ($query) {
//                    $query->orderBy('created_at', 'desc');
                    $query->limit(1);
                },
            ])
                ->whereUser_id(Auth::user()->id)
                ->select(['domains.*'])
//                ->distinct('domains.domain')
                ->whereShow(true)
                ->orderBy('domains.name')
//                ->distinct('domains.name')
//                ->groupBy('domains.id')
//                ->ExpiraDate()
                ->get();

        }

        return view('domain.index', $in);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function test()
    {

        $name0 = "соковыжималки
электрические миксеры[14][14]
мясорубки
кофемолки
фритюрницы[14]
электрические чайники
термопоты
вафельницы
блинницы (см. блины)
кофеварки
блендеры[15]
мультирезки
измельчители / овощерезки / шинковки
рисоварки[16]
тостеры
кухонные комбайны[14][15]
тестомесилки (другое название — кухонные машины; см. замес)
кухонные вытяжки
кухонные весы
кофеварки и кофемашины
сушилки для фруктов и овощей
яйцеварки
сэндвичницы (см. сэндвич)
хлебопечки
мороженицы
электрошашлычницы (электромангал)
йогуртницы
мультиварки
электрогриль (см. гриль)
вакуумный упаковщик[источник не указан 61 день]
пароварки
точило для ножей
электроштопоры[источник не указан 61 день]
электрооткрывалки для консервных банок
бытовая электроника[12]
радиоприемники
телевизоры[16]
видеомагнитофоны
CD- и DVD-плееры[16]
домашние кинотеатры
фотоаппараты (в т.ч. цифровые)
видеокамеры
часы и будильники
компьютеры
игровые приставки
Проекторы
Музыкальные центры
телефоны и автоответчики.";

        $in = [];

        $in['names'] = explode("\n", $name0);
//        dd($name);
        $in['data'] = [];

        for ($row = 0; $row <= 40; $row++) {
            $r = [];
            for ($col = 0; $col <= 20; $col++) {
                $r[] = [
                    'type' => rand(1, 5),
                    'type2' => rand(1, 30),
                    'val' => rand(10, 8000),
                    'dop' => rand(100, 800),
                    'nap' => rand(1, 3)
                ];
            }
            $in['data'][] = $r;
        }

        return view('job2308.index', $in);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
