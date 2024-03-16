<template>
    <div class="product-swiper pt-9 ">
        <div class="title my-15 font-weight-bold mx-5 d-flex align-center justify-space-between">
            <h2 style="font-weight: 700;" :class="[`text-${titleColor} text-h4`]">
                {{ title }}
            </h2>
            <a href="#" style="color: #02218f; text-decoration: underline;">
                Select All
            </a>

        </div>
        <v-row v-if="!products.length" class="pb-16 px-4">
            <v-col cols="12">
                <v-row>
                    <v-col cols="3" v-for="num in 4" :key="num">
                        <v-skeleton-loader type="image ,article , avatar,avatar,avatar,avatar">

                        </v-skeleton-loader>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
        <swiper :modules="modules" :pagination="{ clickable: true }" :navigation="true" :slides-per-view="4"
            :space-between="35" :autoplay="{
                delay: 3000,

            }" class="pb-16 px-4">


            <swiper-slide class="pb-5" v-for="pro in products" :key="pro.id">
                <v-card elevation="0">
                    <v-hover v-slot="{ isHovering, props }">
                        <div class="parent position-relative"
                            style="overflow: hidden; height: 200px; margin-bottom:7px;   border-radius: 7px;">
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
                        {{ `(${pro.desc})${pro.title}`.lignth <= 55 ? `${pro.desc})${pro.title}` :
                            `${pro.desc})${pro.title}`.substring(0, 55) + " ..." }} </v-card-text>
                            <br />
                            <v-rating v-model="pro.rate" half-increments readonly class="pt-1" color="yellow-darken-2"
                                size="x-small" density="compact"></v-rating>
                            <v-card-text class="pl-0">
                                <del>${{ pro.price }}</del> From
                                <span class="text-red font-weight-bold text-subtitle-1">

                                    ${{
                                        Math.ceil(pro.price - pro.price * (pro.sale / 100))
                                    }}
                                </span>

                            </v-card-text>
                            <v-btn-toggle v-model="showenItim[pro.id]">

                                <v-btn v-for="(pic, i) in pro.images" :key="i" :value="pic.path" size="x-small" rounded="xl"
                                :ripple="false">
                                    <img :src="pic.path" width="30" height="30"
                                        style="border-radius: 50%; border: 1px solid gray;" alt="">
                                </v-btn>
                            </v-btn-toggle>
                            <!--<div class="mt-5">-->
                                <v-btn density="compact" class="py-3 px-12 mt-5"
                                    @click="$router.push({ name: 'productes-details', params: { productId: pro.id } })"
                                    style="transform: none; border-radius: 30px;" variant="outlined">
                                    Choose Options
                                </v-btn>
                            <!--</div>-->
                </v-card>
            </swiper-slide>
        </swiper>
    </div>
</template>
<script>
//import { Swiper ,SwiperSlide } from "vue-awesome-swiper";
import { Pagination, Navigation, Autoplay } from 'Swiper'
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'



export default {
    inject:["Emitter"],
    methods:{
OpenQuickView(product){
    this.Emitter.emit("OpenQuickView",product)
}
    },

    props: {
        products: {
            type: Array
        },
        title: {
            type: String
        },
        titleColor: {
            type: String
        }
    },
    data() {
        return {
            showenItim: {}
        }
    },

    components: {
        Swiper,
        SwiperSlide
    },
    setup() {
        return {
            modules: [Pagination, Navigation, Autoplay]
        }
    }
}

</script>
<style lang="scss">
.product-swiper {
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