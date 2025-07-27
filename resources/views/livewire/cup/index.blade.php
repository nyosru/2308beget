<div>


{{--    <livewire:cup.cup-create />--}}

    @if(1==2)
        <div id="map"></div>
        <div id="app"></div>

        <div class="max-h-[200px] overflow-auto"        >
            <pre class="text-xs">
            {{ print_r($cups->toArray(), true) }}
            </pre>
        </div>
    @endif

    <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 px-5">
        @foreach( $cups as $item )
            {{--    {{ print_r($item) }}--}}
            {{--                        @include('krugi.item',['item'=>$item])--}}
            <livewire:cup.item :i="$item"/>
            {{--    @include('krugi.item')--}}
        @endforeach
    </div>

</div>
