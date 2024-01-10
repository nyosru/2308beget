<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1"/>
</head>
<body class="font-sans antialiased">

<div class="p-2 alert alert-info shadow-md" style="z-index:10; position: fixed; bottom: 10px; right: 10px;">Создание
    сайта <a href="https://php-cat.com" class="underline" target="_blank">php-cat.com</a></div>

<div class="container">
    <div class="row">
        <div class="col-12 py-5">


            <div style="width:300px; margin: 0 auto;">

                @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form method="post" action="{{ route('krugi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-top:20px;">
                        <input type="text" name="name" required/>
                        <br/>
                        <br/>
                        <input type="file" name="photo" accept="image/jpeg"/> <br/>
                        <input type="file" name="photo2" accept="image/jpeg"/> <br/>
                        <input type="file" name="photo3" accept="image/jpeg"/> <br/>
                        <input type="file" name="photo4" accept="image/jpeg"/> <br/>
                        <input type="file" name="photo5" accept="image/jpeg"/> <br/>
                        <br/>
                        <input type="text" name="s" required size="5"/>
                        <button type="submit">Добавить</button>
                    </div>
                </form>
            </div>


<br clear="all" />
<br clear="all" />

            @foreach( $cups as $item )
                <div style="width:300px; margin: 0 auto; float:left;
                margin-bottom: 5px; margin-right: 5px; padding-left: 5px; border-left: 3px solid green;">
{{--                {{ print_r($item) }}--}}
                {{ $item->name }}

                    <A href="/storage/krugi/cups/mini/{{$item->img1}}" target="_blank">img1</A>
                    <A href="/storage/krugi/cups/mini/{{$item->img2}}" target="_blank">img2</A>
                    <A href="/storage/krugi/cups/mini/{{$item->img3}}" target="_blank">img3</A>
                    <A href="/storage/krugi/cups/mini/{{$item->img4}}" target="_blank">img4</A>
                    <A href="/storage/krugi/cups/mini/{{$item->img5}}" target="_blank">img5</A>

                <Br/>
            <form action="{{ route('krugi.delete',['cup'=>$item->id]) }}" method="post" >
                @csrf
                <input type="text" name="s" required size="5"/>
                <button type="submit" >удалить</button>
            </form>
                </div>
                {{--                @include('krugi.item',['item'=>$item])--}}
                {{--    @include('krugi.item')--}}
            @endforeach

        </div>
    </div>
</div>
</body>

</html>
