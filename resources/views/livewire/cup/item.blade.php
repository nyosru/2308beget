<div class="mb-5">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
{{--    item : {{ $i }}--}}
{{--    sdf--}}

{{--    <div class="">--}}
{{--        <div class="mb-3">--}}
            <div class="relative block bg-white rounded-lg shadow-lg overflow-hidden">

{{--                @if( !empty($i['img2']) )--}}
{{--                    img2--}}
{{--                @endif--}}

                @if( !empty($i['img1']) )

                    <img src="{{ '/storage/krugi/cups/mini/'.$i['img1'] }}" loading=lazy  class="aspect-square" />

                @endif
                <div class="px-6 pt-6 pb-2">
                    <h5 class="font-bold text-lg mb-3">{{ $i['name'] }}</h5>
                </div>
            </div>
{{--        </div>--}}
{{--    </div>--}}


</div>
