<template>
    <div class="new-products pt-12 ">
        <v-container fluid>
            <div class="title my-10 font-weight-bold mx-5 d-flex align-center justify-space-between">
                <h2 style="font-weight: 900;" class=" text-h5  flex-grow-1">

                    New Products
                </h2>
                <a href="#" style="color: #02218f; text-decoration: underline;">
                    Select All
                </a>

            </div>
            <v-row>
                <v-col cols="7" v-if="!products.length" class="pt-16">
            <v-row>
                <v-col cols="4" v-for="num in 3" :key="num" >
                    <v-skeleton-loader type="image ,article , avatar,avatar">

                    </v-skeleton-loader>
                </v-col>
                    </v-row>
</v-col>

                <v-col cols="7" class="pt-16" v-else>
                    <swiper :modules="modules" :pagination="{ clickable: true }" :slides-per-view="3" :space-between="20"
                        :autoplay="{
                            delay: 3000,

                        }" class="pb-16 px-4">


                        <swiper-slide class="pb-5" v-for="pro in products" :key="pro.id">
                            <v-card elevation="0">
                                <v-hover v-slot="{ isHovering, props }">
                                    <div class="parent position-relative"
                                        style="overflow: hidden; height: 190px; margin-bottom:7px;   border-radius: 7px;">
                                        <img :src="showenItim[pro.id] ? showenItim[pro.id] : pro.default_imge"
                                            :style="`height: 100%;  width:100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${isHovering ? 1.05 : 1})`"
                                            v-bind="props">
                                            <v-btn variant="outlined" 
                        style="text-transform: none;
                         border-radius: 30px;
                         position: absolute;
                        left: 50%;
                        top: 50%;
                        width: 60px;
                        height: 30px;
                    transform: translate(-50%, -50%);
                    border-radius: 30px;
                    font-size: 12px;
                    transition: 0.2 all ease-in-out;
                    opacity: 0;
                         "
                         @click="OpenQuickView(pro)"
                            class=" bg-white quick-view-btn" density="compact">
                            Quick View
                        </v-btn>
                                    </div>
                                </v-hover>
                                <v-card-text>
                                    ({{ pro.title }})
                                    {{ `(${pro.desc})${pro.title}`.lignth <= 40 ? `${pro.desc})${pro.title}` :
                                        `${pro.desc})${pro.title}`.substring(0, 40) + " ..." }} </v-card-text>
                                        <br />
                                        <v-rating v-model="pro.rate" half-increments readonly class="pt-1"
                                            color="yellow-darken-2" size="x-small" density="compact"></v-rating>
                                        <v-card-text class="pl-0">
                                            <del>${{ pro.price }}</del> From
                                            <span class="text-red font-weight-bold text-subtitle-1">

                                                ${{
                                                    Math.ceil(pro.price - pro.price * (pro.sale / 100))
                                                }}
                                            </span>

                                        </v-card-text>
                                        <v-btn-toggle v-model="showenItim[pro.id]">

                                            <v-btn v-for="(pic, i) in pro.images" :key="i" :value="pic.path" size="x-small"
                                                rounded="xl" :ripple="false">
                                                <img :src="pic.path" width="30" height="30"
                                                    style="border-radius: 50%; border: 1px solid gray;" alt="">
                                            </v-btn>
                                        </v-btn-toggle>
                                        <div class="mt-5">
                                            <v-btn density="compact" class="py-3 px-12"
                                            @click="$router.push({name:'productes-details', params:{productId:pro.id} })"
                                                style="transform: none; border-radius: 30px;" variant="outlined">
                                                Choose Options 
                                            </v-btn>
                                        </div>
                            </v-card>
                        </swiper-slide>
                    </swiper>
                </v-col>
                <v-col cols="5">
                    <img src="@/assets/images/vr-banner.webp">
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
import { Pagination, Autoplay } from 'Swiper'
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
//import{ VSkeletonLoader  } from 'vuetify/lib/labs/components.mjs'



export default {

    props: {
        products: {
            type: Array
        }
    },
    inject:["Emitter"],
    methods:{
OpenQuickView(product){

    this.Emitter.emit("OpenQuickView",product)
    
}
    },
    data() {
        return {
            showenItim: {}
        }
    },

    components: {
        Swiper,
        SwiperSlide,
        //VSkeletonLoader
    },
    setup() {
        return {
            modules: [Pagination, Autoplay]
        }
    }
}

</script>
<style lang="scss">
.new-products {
    .swiper {

        .swiper-button-next,
        .swiper-button-prev {
            width: 35px;
            height: 35px;
            border: 1px solid #504e4e;
            border-radius: 50%;
            background: white;
            top: 34%;

            &::after {
                font-size: 13px;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #414040;
                font-size: 900;

            }

        }

        .swiper-pagination {
            .swiper-pagination-bullet {
                width: 13px;
                height: 13px;
            }
        }
        .parent:hover{
            .quick-view-btn{
                opacity: 1 !important;
            }
        }
    }
}
</style>