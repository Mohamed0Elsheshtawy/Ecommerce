
<template>
    <div style="margin-top: 170px; padding: 0;" class="product-details">
        <h1 class=" text-h4 py-10 ">
            product
        </h1>
        <v-container fluid>
            <v-row class="pb-16"  :loading="loading">
                <v-col cols="7" class="pt-0">

                <img v-if="!loading" class="w-100" style="height: 500px;" :src="tab ? tab.path :singlProduct.default_imge">
                    <v-skeleton-loader v-if="loading" type="image ,image , image"></v-skeleton-loader>
                    <v-tabs center-active height="220" class="mt-5"
                    v-model="tab"
                    >
                        <v-tab v-for="(img ,i) in singlProduct.images" :key="i" 
                        class="mx-10"
                        :value="img"
                        >
                    <img :src="img.path" width="100" height="200">


                        </v-tab>
                    </v-tabs>
                </v-col>
                <v-col cols="5" class="pt-0 pl-7">
                    <v-skeleton-loader v-if="loading" type="article ,article , article"></v-skeleton-loader>

                    <v-card elevation="0" v-if="!loading" > 
                        <v-card-title class="px-0 font-weight-bold text-h5 ">({{ singlProduct.title }}) Sample - {{ singlProduct.category }}</v-card-title>
                      <div class="rateing d-flex align-center px-0 my-2">
                        <v-rating v-model="singlProduct.rate" half-increments readonly class="pt-1 px-0 "
                         color="yellow-darken-2"
                         size="large" density="compact">
                       </v-rating>
                    </div>
                    <v-card-text class="text-grey-darken-1 px-0 ">
                        {{ singlProduct.desc }}
                    </v-card-text>
                    <v-card-text class="text-grey-darken-1 px-0 ">
                      Brand: {{ singlProduct.brand }}
                    </v-card-text>
                    <v-card-text class="pl-0 text-grey-darken-1">
                                            <del>${{ singlProduct.price }}</del> From
                                            <span class="text-amber-accent-4 font-weight-bold text-subtitle-1">

                                                ${{
                                                    Math.ceil(singlProduct.price - singlProduct.price * (singlProduct.sale / 100))
                                                }}
                                            </span>

                                        </v-card-text>
                                        <span class="text-grey-darken-1">Quantity :</span>
                                        

                                        <div class="counter px1 mt-5"
                                        style="border: solid 1px #424242; border-radius: 30px;  width: fit-content;"
                                        
                                        >
                                        
                                        <v-icon size="22" @click="quantity>1 ? quantity-- :false">mdi-minus</v-icon>
                                        <input type="number"
                                        style="border:none;  outline: none;  width:70px; font-size: 15px;"
                                        class="text-center py-2.5"
                                        min="1"
                                        v-model="quantity"
                                        >
                                        <v-icon size="22" @click="quantity++">mdi-plus</v-icon>
                                        </div>
                                        <v-card-text class="text-grey-darken-1 px-0 ">
                                            Subtotal:  ${{
                                                    Math.ceil(singlProduct.price - singlProduct.price * (singlProduct.sale / 100)) * quantity
                                                }}
                                    </v-card-text>
                                        <v-card-actions class="w-100 mt-15 mx-0">
                                            <v-btn
                                            variant="outlined"
                                            style="text-transform: none; border-radius: 30px;"
                                            class="w-75 text-white bg-grey-darken-4"
                                            density="compact"
                                            height="50px"
                                            :loading="btnLoading"
                                            @click="addToCart(singlProduct)"
                                        
                                            >
                                            Add To Cart

                                            </v-btn>
                                        </v-card-actions>
                    
                    
                    </v-card>
                </v-col>
            </v-row></v-container>
    </div>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { productsModule } from "@/stores/products";
import { cartStore } from "@/stores/cart";

export default {
    data() {
        return {
            card:"",
            quantity:1,
            tab:"",
            loading: false,
            btnLoading: false

    }},
    inject:["Emitter"],
    methods: {
        ...mapActions(productsModule, ["getSinglProducts"]),
        
        ...mapActions(cartStore, ["addItem"]),
        addToCart(item){
            item.quantity =this.quantity;
            this.btnLoading=true
            setTimeout(() => {
            this.btnLoading=false
            this.Emitter.emit("openCart");
            this.Emitter.emit("showMsg" ,item.title);
            this.addItem(item);
            }, 1000);
        }

    },
    async mounted() {
        this.loading = true;
        
       await this.getSinglProducts(this.$route.params.productId);
       
        this.loading = false;
    },
    computed: {
    ...mapState(productsModule, ["singlProduct"]),
    },
    }
</script>
