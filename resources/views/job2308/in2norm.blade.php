<div
    style="white-space: pre; width: 90px;"
    class="input-group p-0 xmb-3 @if( $type2 == 1) bg-warning @endif"
>
    <input type="text"
           @if( $type2 == 2 ) readonly @endif
           aria-label="Amount (to the nearest dollar)"
           class="form-control my-0 py-0 px-1"
           value="{{ $val ?? 'x'}}"
           style="font-size: 12px;"
    >
    @if( $type2 > 10 )
        <span class="input-group-text @if( $type2 == 15 ) bg-warning @endif @if( $type2 == 14 ) bg-danger @endif py-0 px-1"><abbr title="какая то доп инфа про {{ $dop }}"
                                                       style="font-size: 12px;"
            >
        @if( $nap == 1 )
                    &#8679;
                @elseif( $nap == 2 )
                    &#8681;
                @endif
                {{ $dop }}
    </abbr></span>
    @endif
</div>
