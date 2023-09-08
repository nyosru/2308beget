<div class="col-12 col-md-4 col-lg-3 mb-5">
    <div class="mb-6 lg:mb-0">
        <div class="relative block bg-white rounded-lg shadow-lg">

            @if( !empty($item['img1']) )

                <img src="{{ '/storage/krugi/cups/'.$item['img1'] }}"/>

                @if( 1==2 )
                    @if( !empty($item['img1']) )
                        <div
                            class="flex text-center text-xs">
                            <div
                                v-if="item.image1 != ''"
                                @mouseover="show_img = item.image1"
                                @click="show_img = item.image1"
                                class="flex-1 h-4 xbg-blue-600"
                                :class="show_img == item.image1 ? 'bg-blue-600' : 'bg-blue-300'"
                            >
                                <!-- фото -->
                            </div>
                            <div
                                v-if="item.image2 != ''"
                                @mouseover="show_img = item.image2"
                                @click="show_img = item.image2"
                                class="flex-1 xshrink-0 h-4 xwx-32 xbg-blue-300"
                                :class="show_img == item.image2 ? 'bg-blue-600' : 'bg-blue-300'"
                            >
                                <!-- фото -->
                            </div>
                            <div
                                v-if="item.image3 != ''"
                                @mouseover="show_img = item.image3"
                                @click="show_img = item.image3"
                                class="flex-1 h-4 xbg-blue-300"
                                :class="show_img == item.image3 ? 'bg-blue-600' : 'bg-blue-300'"
                            >
                                <!-- фото -->
                            </div>
                            <div
                                v-if="item.image4 != ''"
                                @mouseover="show_img = item.image4"
                                @click="show_img = item.image4"
                                class="flex-1 h-4 xbg-blue-300"
                                :class="show_img == item.image4 ? 'bg-blue-600' : 'bg-blue-300'"
                            >
                                <!-- фото -->
                            </div>
                            <div
                                v-if="item.image5 != ''"
                                @mouseover="show_img = item.image5"
                                @click="show_img = item.image5"
                                class="flex-1 h-4 xbg-blue-300"
                                :class="show_img == item.image5 ? 'bg-blue-600' : 'bg-blue-300'"
                            >
                                <!-- фото -->
                            </div>
                        </div>
                        <br clear="all"/>

                    @endif
                @endif
            @endif

            <div class="flex">
                <!-- <a
                :href="'https://www.youtube.com/watch?v='+item.link"
                target="_blank"
                xonClick="window.open(this.href, '', 'width='+screen.availWidth/2+',height='+screen.availHeight/2+',top='+screen.availHeight/4+',left='+screen.availWidth/4); return false;"
              > -->

                <div
                    class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                >
                    <img xsrc="item.image1" :src="show_img" class="w-full"/>
                    <div
                        class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                        style="background-color: rgba(251, 251, 251, 0.15);"
                    ></div>
                </div>

                <!-- </a> -->
            </div>
            </template>

            <div class="px-6 pt-6 pb-2">
                <h5 class="font-bold text-lg mb-3">{{ $item['name'] }}</h5>
                <p class="text-gray-500 mb-4">
                    <small>
                        <!-- <pre>{{ $item }}</pre> -->

                        <!-- Published -->
                        <u>{{ $item['date'] }}</u>
                        <!-- by -->
                        <!-- <a href="" class="text-gray-900">Anna Maria Doe</a> -->
                    </small>
                </p>
                <p class="mb-1 xpb-2">
                    {{ $item['opis'] }}
                </p>
                <!-- <a
                  href="#!"
                  data-mdb-ripple="true"
                  data-mdb-ripple-color="light"
                  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                >
                  Read more
                </a> -->
            </div>
        </div>
        <!-- </a> -->
    </div>
</div>
