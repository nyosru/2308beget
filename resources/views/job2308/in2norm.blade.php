<div
    style="white-space: pre; width: 110px;"
    class="input-group p-0 xmb-3 @if( $type2 == 1) bg-warning @endif"
>
    <input type="text"

           name="var[]"
           pattern="(\d{1,8}\.\d{1,2}|\d{1,8})"

           @if( $type2 == 2 || $type2 == 27 ) readonly @endif
           aria-label="Amount (to the nearest dollar)"
           class="form-control my-0 py-0 px-1"
           value="{{ $val ?? 'x'}}"
           style="font-size: 12px;"
    >
    @if( $type2 > 20 )
        <span class="input-group-text @if( $type2 >= 25 ) bg-warning @endif @if( $type2 == 24 ) bg-danger @endif py-0 px-1"><abbr title="какая то доп инфа про {{ $dop }}"
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
