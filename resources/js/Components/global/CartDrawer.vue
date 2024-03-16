<template>
  <div class="cart-drawer">
    <v-navigation-drawer v-model="drawer" location="right" temporary width="370" class="pr-1">
      <v-card elevation="0">
        <v-card-title class="px-0 font-weight-bold d-flex justify-space-between align-center">Shopping Cartd 
           <v-icon @click="drawer=false" size="22" class="">mdi-close</v-icon></v-card-title>
        <v-card-text class="px-0 text-grey-darken-1"> {{ cartItems.length }} items</v-card-text>
        <v-card-text class="px-0 text-grey-darken-1 pt-0" v-if="!cartItems.length">Free Shipping Order Over
          $10000</v-card-text>
        <v-card-text class="px-0 text-grey-darken-1 pt-0 text-center" v-if="!cartItems.length">Your cart is
          empty</v-card-text>
          <div class="bar-parent mt-6 position-relative" v-if="cartItems.length ">
          <svg width="30" 
             :style="` 
             left: calc(${parseInt((calcTotalPrice / 10000) * 100) <= 100 ? parseInt((calcTotalPrice / 10000) * 100) : 100}% - 30px);
              display: block;
              position: absolute;
              bottom: 22%;
              z-index: 1;
              transition: 0.15s all ease-in-out;
              `" :fill="parseInt((calcTotalPrice / 10000) * 100) < 50 ? 'red' : parseInt((calcTotalPrice / 10000) * 100)
                              > 50 && parseInt((calcTotalPrice / 10000) * 100) < 100 ? 'orange' : 'green'" class="icon-shipping-truck" viewBox="0 0 40.55 24">
            <g id="Layer_2" data-name="Layer 2">
              <g id="Layer_1-2" data-name="Layer 1">
                <path class="truck-body"
                  d="M40.43,11a3.86,3.86,0,0,0-3.68-2.65H28a1.25,1.25,0,0,1-1.43-1.43c0-2.18,0-4.35,0-6.53,0-.31-.08-.36-.37-.36H5.11a1.18,1.18,0,0,0-1.3,1.32c0,.74,0,1.48,0,2.22,0,.21-.06.27-.26.26-.36,0-.71,0-1.07,0a1.19,1.19,0,1,0,0,2.37H7.19c.43,0,.85,0,1.27,0a1,1,0,0,1,1.07,1A1.19,1.19,0,0,1,8.24,8.48H1.35a1.83,1.83,0,0,0-.47,0A1.19,1.19,0,0,0,0,9.85a1.18,1.18,0,0,0,1.19,1h9.66c.34,0,.68,0,1,0A1.19,1.19,0,0,1,13,12.47a1.26,1.26,0,0,1-1.26.76H1.24a1.19,1.19,0,1,0,0,2.38c.76,0,1.51,0,2.26,0,.26,0,.33.07.32.32,0,1,0,2.09,0,3.13A1.18,1.18,0,0,0,5.1,20.36c.63,0,1.26,0,1.9,0,.27,0,.39.06.47.36a4.55,4.55,0,0,0,8.78-.11.29.29,0,0,1,.32-.25H28.09a.3.3,0,0,1,.34.27,4.55,4.55,0,0,0,8.8,0,.31.31,0,0,1,.35-.26c.49,0,1,0,1.47,0a1.37,1.37,0,0,0,1.5-.87V11.41C40.41,11.29,40.47,11.12,40.43,11ZM32.84,21.62A2.18,2.18,0,1,1,35,19.45,2.21,2.21,0,0,1,32.84,21.62Zm-21,0A2.18,2.18,0,1,1,14,19.45,2.2,2.2,0,0,1,11.86,21.62Z">
                </path>
                <path class="truck-body"
                  d="M29.27,6h5.85c.1,0,.2,0,.29,0C33.64,2.72,32,.91,28.91.26V.57c0,1.68,0,3.35,0,5C28.9,5.9,29,6,29.27,6Z">
                </path>
                <path class="wheel" fill="white" d="M11.87,17.27A2.18,2.18,0,1,0,14,19.45,2.2,2.2,0,0,0,11.87,17.27Z">
                </path>
                <path class="wheel" fill="white" d="M32.85,17.27A2.18,2.18,0,1,0,35,19.45,2.22,2.22,0,0,0,32.85,17.27Z">

                </path>
              </g>
            </g>
          </svg>
          <v-progress-linear
           :color="parseInt((calcTotalPrice / 10000) * 100) < 50 ? 'red' : parseInt((calcTotalPrice / 10000) * 100)
                              > 50 && parseInt((calcTotalPrice / 10000) * 100) < 100 ? 'orange' : 'green'" 
           height="10" 
          :model-value="parseInt((calcTotalPrice / 10000) * 100) <= 100 ? parseInt((calcTotalPrice / 10000) * 100) : 100" striped>

          </v-progress-linear>
        </div>
        <v-card-text class="px-0 text-grey-darken-1 pt-2" v-if="cartItems.length &&  10000 - calcTotalPrice > 0" >
          Only ${{ 10000 - calcTotalPrice }} From Free Shipping 
          </v-card-text>
          <v-card-text class="px-0 text-grey-darken-1 pt-2" v-if="cartItems.length &&  10000 - calcTotalPrice <= 0" >
          Your Order New Is Included Free Shipping 
          </v-card-text>
        <v-card-actions v-if="!cartItems.length">

          <v-btn  @click="drawer=false"  class="w-100 rounded-xl"  variant="outlined" density="compact" height="45">
            Continue Shopping</v-btn>

        </v-card-actions>
      </v-card>
      <v-card elevation="0" class="pa-0 mt-5 items-card" v-if="cartItems.length" max-height="350px" style="overflow-y: auto;">
      
       
          <v-container class="px-2">
            <v-row v-for="item in cartItems" class="align-center mb-4">
                
              <v-col cols="5" class="pt-0"><img class="w-100 h-100" :src="item.default_imge" alt=""></v-col>
              <v-col cols="7" class="pt-0">
                <v-card-title style="white-space:pre-wrap; line-height: 1.2; font-size: 14px; ">
                  {{ item.title }} Simple - {{ item.category }}
                </v-card-title>
                <v-card-text class=" text-grey-darken-1">Category: {{ item.category }}
          </v-card-text>
            
          <v-card-text class="pl-5 py-0 ">
                                            
                                            <span class="font-weight-bold text-subtitle-1">

                                                ${{
                                                    Math.ceil(item.price - item.price * (item.sale / 100)) * item.quantity
                                                }}
                                            </span>

                                        </v-card-text>
    <div class="item-footer d-flex justify-space-between align-center text-start">
      <div class="counter mx-5"
                                        style="border: solid 1px #424242; border-radius: 30px;  width: fit-content;"
                                        
                                        >
                                        
                                        <v-icon size="18" @click="item.quantity>1 ? item.quantity-- :false">mdi-minus</v-icon>
                                        <input type="number"
                                        style="border:none;  outline: none;  width:45px; font-size: 12px;"
                                        class="text-center py-2"
                                        min="1"
                                        v-model="item.quantity"
                                        >
                                        <v-icon size="18" @click="item.quantity++">mdi-plus</v-icon>
                                        </div>
                                        <v-icon @click="deleteItem(item.id)" size="22" class="">mdi-close</v-icon>
    </div>
              </v-col>
            </v-row>
          </v-container>
  
      </v-card>
      <v-card elevation="0" class="mt-5"  v-if="cartItems.length">
        <v-card-actions class="flex-column justify-center align-center gap-3 mb-5">

<v-btn style="border: solid 1px gray; text-transform: none;"  class="w-100 rounded-xl" variant="elevated" elevation="0"
color="blue" density="compact" height="50">
  Check Qut</v-btn>
<v-btn @click="$router.push({name:'cart-page'})" style="border: solid 1px black; text-transform: none;"  class="w-100 rounded-xl mx-0" variant="outlined" density="compact" height="50">
  Cart view</v-btn>
  <!--{{ calcTotalPrice }}-->

</v-card-actions>
      </v-card>
      <!--<v-btn @click="deleteItem(45)">deleteItem</v-btn>-->

    </v-navigation-drawer>

  </div>

</template>

<script>
import { cartStore } from "@/stores/cart";
import { mapActions, mapState } from "pinia";


export default {
  inject: ["Emitter"],
  computed: {
    ...mapState(cartStore, ["cartItems"]),
    calcTotalPrice(){
      let total = 0;
      this.cartItems.forEach((product) => {
        total +=
        Math.ceil(product.price - product.price * (product.sale / 100)) * product.quantity

      }) 
      return total;
    }
  },
  data: () => ({
    drawer: false,
  }),

  methods: {
    ...mapActions(cartStore, ["gitCartItems", "deleteItem"]),
    addToCart(item) {
      item.quantity = this.quantity;
      this.addItem(item);
    }

  },

  mounted() {
    this.Emitter.on("openCart", () => {
      this.drawer = !this.drawer;
      //this.drawer= true;
    })
  }
};
</script>
<style lang="scss">
.items-card{
  
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

</style>