<template>
    <div style="margin-top: 170px; padding: 0;" class="productes-categories">
        <h1 class="text-center text-h4 py-10 ">
            {{ $route.params.title }}
        </h1>
        <v-container fluid>
            <v-row v-if="loading" class="pb-16 px-4">
                <v-col cols="12">
                    <v-row>
                        <v-col cols="3" v-for="num in 4" :key="num">
                            <v-skeleton-loader type="image ,article , avatar,avatar,avatar,avatar">

                            </v-skeleton-loader>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
            <v-lazy>
                <v-card :loading="loading" elevation="0">
                    <v-row class="pb-16 px-4" v-if="!loading">
                        <v-col cols="3" v-for="item in ProductCategory" :key="item.id">
                            <v-card elevation="0">
                                <v-hover v-slot="{ isHovering, props }">
                                    <div class="parent position-relative"
                                        style="overflow: hidden; height: 200px; margin-bottom:7px;   border-radius: 7px;">
                                        <img :src="showenItim[item.id] ? showenItim[item.id] : item.default_imge"
                                            :style="`height: 100%;  width:100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${isHovering ? 1.05 : 1})`"
                                            v-bind="props">
                                                        <v-btn variant="outlined" style="text-transform: none;
                                        border-radius: 30px;
                                        position: absolute;
                                        left: 50%;
                                        top: 50%;
                                        width: 90px;
                                        height: 40px;
                                    transform: translate(-50%, -50%);
                                    border-radius: 30px;
                                    font-size: 12px;
                                    transition: 0.2 all ease-in-out;
                                    opacity: 0;
                                        " @click="OpenQuickView(item)" class=" bg-white quick-view-btn" density="compact">
                                                            Quick View
                                                        </v-btn>
                                    </div>
                                </v-hover>
                                <v-card-text>
                                    ({{ item.title }})
                                    {{ `(${item.desc})${item.title}`.lignth <= 55 ? `${item.desc})${item.title}` :
                                        `${item.desc})${item.title}`.substring(0, 55) + " ..." }} </v-card-text>
                                        <br />
                                        <v-rating v-model="item.rate" half-increments readonly class="pt-1"
                                            color="yellow-darken-2" size="x-small" density="compact"></v-rating>
                                        <v-card-text class="pl-0">
                                            <del>${{ item.price }}</del> From
                                            <span class="text-red font-weight-bold text-subtitle-1">

                                                ${{
                                                    Math.ceil(item.price - item.price * (item.sale / 100))
                                                }}
                                            </span>

                                        </v-card-text>
                                        <v-btn-toggle v-model="showenItim[item.id]">

                                            <v-btn v-for="(pic, i) in item.images" :key="i" :value="pic.path" size="x-small"
                                                rounded="xl" :ripple="false">
                                                <img :src="pic.path" width="30" height="30"
                                                    style="border-radius: 50%; border: 1px solid gray;" alt="">
                                            </v-btn>
                                        </v-btn-toggle>
                                        <div class="my-5">
                                            <v-btn density="compact" class="py-3 px-12"
                                                style="transform: none; border-radius: 30px;  height: 40px;" variant="outlined"
                                                @click="$router.push({ name: 'productes-details', params: { productId: item.id } })">
                                                Choose Options
                                            </v-btn>
                                        </div>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>
            </v-lazy>
        </v-container>
    </div>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { productsModule } from "@/stores/products";
export default {
    inject:["Emitter"],
 
    data() {
        return {
            showenItim: {},
            loading: false
        }
    },
    methods: {
        ...mapActions(productsModule, ["getProductsCategory"]),
        OpenQuickView(product){
    this.Emitter.emit("OpenQuickView",product)
        }

    },
    async mounted() {
        this.loading = true;
        await this.getProductsCategory(this.$route.params.category);
        this.loading = false;

        //console.log(this.flashDeals ,"jjjjjjjjjjjjjjjjjj"); 
    },
    watch: {
        async $route() {
            document.documentElement.scrollTo(0, 0);
            this.loading = true;
            await this.getProductsCategory(this.$route.params.category);
            this.loading = false;
        }
    }, computed: {
        ...mapState(productsModule, ["ProductCategory"]),
    }

}
</script>
<style lang="scss">
    .parent:hover{
            .quick-view-btn{
                opacity: 1 !important;
            }}
</style>