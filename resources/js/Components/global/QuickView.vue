
<template>
    <div class="quick-view">
    <v-dialog v-model="dialog" max-width="900" max-height="600">
        <v-icon 
        style="background: black; color: white; font-size: 18px;
        position: absolute;
        top: -14px;
        right: -14px;
        padding: 13px;
        z-index: 10;
        cursor: pointer;
        "
        @click="dialog=false, tab=null"
        >
            mdi-close
        </v-icon>
<v-card elevation="0" class="content-card">
    
    <v-container fluid class="bg-white px-8 pt-10">
            <v-row class="pb-16"  :loading="loading">
                <v-col cols="7" class="pt-0">

                <img v-if="!loading" class="w-100" style="height: 400px;" :src="tab ? tab.path :product.default_imge">
                    <v-skeleton-loader v-if="loading" type="image ,image , image"></v-skeleton-loader>
                    <v-tabs center-active height="220" class="mt-0" 
                    v-model="tab"
                    >
                        <v-tab v-for="(img ,i) in product.images" :key="i" 
                        class="mx-1"
                        :value="img"
                        >
                    <img :src="img.path" width="60" height="80">


                        </v-tab>
                    </v-tabs>
                </v-col>
                <v-col cols="5" class="pt-0 pl-7">
                    <v-skeleton-loader v-if="loading" type="article ,article , article"></v-skeleton-loader>

                    <v-card elevation="0" v-if="!loading" > 
                        <v-card-title style="white-space: pre-wrap;" class="px-0 font-weight-bold text-h5 ">
                            ({{ product.title }}) Sample - {{ product.category }}</v-card-title>
                      <div class="rateing d-flex align-center px-0 my-2">
                        <v-rating v-model="product.rate" half-increments 
                        readonly class="pt-1 px-0 "
                         color="yellow-darken-2"
                         size="x-small" density="compact">
                       </v-rating>
                    </div>
                    <v-card-text class="text-grey-darken-1 px-0 ">
                        {{ product.desc }}
                    </v-card-text>
                    <v-card-text class="text-grey-darken-1 px-0 ">
                      Brand: {{ product.brand }}
                    </v-card-text>
                    <v-card-text class="pl-0 text-grey-darken-1">
                                            <del>${{ product.price }}</del> From
                                            <span class="text-amber-accent-4 font-weight-bold text-subtitle-1">

                                                ${{
                                                    Math.ceil(product.price - product.price * (product.sale / 100))
                                                }}
                                            </span>

                                        </v-card-text>
                                        <span class="text-grey-darken-1">Quantity :</span>
                                        

                                        <div class="counter px1 mt-5"
                                        style="border: solid 1px #424242; border-radius: 30px;  width: fit-content;"
                                        
                                        >
                                        
                                        <v-icon size="18" @click="quantity>1 ? quantity-- :false">mdi-minus</v-icon>
                                        <input type="number"
                                        style="border:none;  outline: none;  width:70px; font-size: 15px;"
                                        class="text-center py-2.5"
                                        min="1"
                                        v-model="quantity"
                                        >
                                        <v-icon size="18" @click="quantity++">mdi-plus</v-icon>
                                        </div>
                                        <v-card-text class="text-grey-darken-1 px-0 ">
                                            Subtotal:  ${{
                                                    Math.ceil(product.price - product.price * (product.sale / 100)) * quantity
                                                }}
                                    </v-card-text>

                                        <v-card-actions class="w-100  mx-0">
                                            <v-btn
                                            variant="outlined"
                                            style="text-transform: none; border-radius: 30px;"
                                            class="w-75 text-white bg-grey-darken-4"
                                            density="compact"
                                            height="50px"
                                            @click="addToCart(product)"
                                            :loading="btnLoading"

                                            >
                                            Add To Cart

                                            </v-btn>
                                        </v-card-actions>
                    
                    
                    </v-card>
                </v-col>
            </v-row></v-container>
</v-card>
</v-dialog>

    </div>

</template>
<script>
import { cartStore } from "@/stores/cart";
import { mapActions } from "pinia";

export default {
    data() {
        return {
            card:"",
            quantity:1,
            tab:"",
            product:"",
            dialog:false,
            loading: false,
            btnLoading:false
    }},
    inject:["Emitter"],

    methods: {
        ...mapActions(cartStore, ["addItem"]),
        addToCart(item){
            item.quantity =this.quantity;
            this.btnLoading=true
            setTimeout(() => {
            this.btnLoading=false
            this.Emitter.emit("openCart");
            this.Emitter.emit("showMsg" ,item.title);
            this.dialog=false;
            this.addItem(item);
            }, 1000);
        }

    },
    async mounted() {
        //this.loading = true;
        
    //   await this.getSinglProducts(1);
    this.Emitter.on("OpenQuickView",(data)=>{
        this.loading = true;
        this.product= data
        this.dialog= true
        setTimeout(() => {
        this.loading = false;
        }, 1500);

     })
    
       
    },
    computed: {
    //...mapState(productsModule, ["singlProduct"]),
    },
    }
</script>
<style lang="scss">
//.quick-view{
    .content-card{
        &::-webkit-scrollbar {
  width: 7px; /* Width of the scrollbar */
}
&::-webkit-scrollbar-track {
  background: #999999; /* Background color of the track */
}
&::-webkit-scrollbar-thumb {
  background: #ffa500;; /* Color of the handle */
}
    }
//}
</style>