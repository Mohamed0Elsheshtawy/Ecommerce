<template>
    <div class="cart-page">
        <v-card elevation="0">

            <v-container fluid class="mb-16">
                <v-row>
                    <v-col cols="12" class="text-grey-darken-1">
                        <v-breadcrumbs class="text-subtitle-2" :items="['Home', 'Your card']">
                            <template v-slot:divider>
                                <v-icon>mdi-chevron-right</v-icon>
                            </template>

                        </v-breadcrumbs>
                    </v-col>
                    <v-col cols="12">
                        <v-card-title class="px-0 font-weight-bold text-h4 align-center">Your Cartd
                        </v-card-title>
                        <v-card-text class="px-0 text-grey-darken-1 pt-0" v-if="!cartItems.length">Free Shipping For All Order Over
          $10000 !</v-card-text>
          <v-card-text class="px-0 text-grey-darken-1 pt-0 text-center" v-if="!cartItems.length">Your cart is
          empty</v-card-text>
          <v-card-actions class="flex-column justify-center align-center my-15">
<v-btn @click="$router.push({name:'home'})" v-if="!cartItems.length"
    style="border: solid 1px black; text-transform: none;"
    class="w-25 rounded-xl mx-0" variant="outlined" density="compact" height="50">
    Continue Shopping</v-btn>
<!--{{ calcTotalPrice  }}-->

</v-card-actions>
                        <div class="bar-parent mt-5 mb-1 position-relative" v-if="cartItems.length">
                            <svg width="30" :style="` 
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
                                        <path class="wheel" fill="white"
                                            d="M11.87,17.27A2.18,2.18,0,1,0,14,19.45,2.2,2.2,0,0,0,11.87,17.27Z">
                                        </path>
                                        <path class="wheel" fill="white"
                                            d="M32.85,17.27A2.18,2.18,0,1,0,35,19.45,2.22,2.22,0,0,0,32.85,17.27Z">

                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <v-progress-linear
                             :color="parseInt((calcTotalPrice / 10000) * 100) < 50 ? 'red' : parseInt((calcTotalPrice / 10000) * 100)
                              > 50 && parseInt((calcTotalPrice / 10000) * 100) < 100 ? 'orange' : 'green' "
                              height="10"
                                :model-value="parseInt((calcTotalPrice / 10000) * 100) <= 100 ? parseInt((calcTotalPrice / 10000) * 100) : 100"
                                striped>

                            </v-progress-linear>
                        </div>
                        <v-card-text class="px-0 text-grey-darken-1 pt-2" 
                            v-if="cartItems.length && 10000 - calcTotalPrice > 0">
                            Only ${{ 10000 - calcTotalPrice }} From Free Shipping
                        </v-card-text>
                    </v-col>
                    <v-row class="mb-5" v-if="cartItems.length">
                        <v-col cols="8">
                            <v-table>
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            Product
                                        </th>
                                        <th class="text-left">
                                            Price
                                        </th>
                                        <th class="text-left">
                                            Quantity
                                        </th>

                                        <th class="text-left">
                                            Total
                                        </th>
                                        <th class="text-left">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in cartItems" :key="item.id">
                                        <td>{{ item.title }}</td>
                                        <td>

                                            ${{
                            Math.ceil(item.price - item.price * (item.sale / 100))
                        }}
                                        </td>
                                        <td>
                                            <div
                                                class="item-footer d-flex justify-space-between align-center text-start">
                                                <div class="counter"
                                                    style="border: solid 1px #424242; border-radius: 30px;  width: fit-content;">

                                                    <v-icon size="18"
                                                        @click="item.quantity > 1 ? item.quantity-- : false">mdi-minus</v-icon>
                                                    <input type="number"
                                                        style="border:none;  outline: none;  width:45px; font-size: 12px;"
                                                        class="text-center " min="1" v-model="item.quantity">
                                                    <v-icon size="18" @click="item.quantity++">mdi-plus</v-icon>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ${{
                            Math.ceil(item.price - item.price * (item.sale / 100)) * item.quantity
                        }}
                                        </td>
                                        <v-icon @click="deleteItem(item.id)" size="22" class="">mdi-close</v-icon>

                                    </tr>
                                </tbody>
                            </v-table>
                            <img class="mt-16 mx-5" src="@/assets/images/cart-page-cards.webp" width="300" alt="">
                        </v-col>
                        <v-col cols="4">
                            <v-card elevation="0">
                                <v-card-title class="font-weight-bold  text-subtitle-1">Order Summary</v-card-title>
                                <div class="bg-grey-darken-1 w-100">
                                    <v-divider length="100%" color="black"></v-divider>
                                    <v-divider length="100%" color="black"></v-divider>
                                </div>
                                <v-card-text class="d-flex justify-space-between align-center text-subtitle-1">
                                    <span>Subtotal</span>
                                    <span class="font-weight-bold ">${{ calcTotalPrice }}</span>
                                </v-card-text>
                                <div class="bg-grey-darken-1 w-100">
                                    <v-divider length="100%" color="black"></v-divider>
                                </div>
                                <v-card-text>Get Showping Estimate</v-card-text>
                                <v-row>
                                    <v-col cols="12" class="pb-0">
                                        <v-select v-model="selectedCountry" :items="countries"
                                            label="Select a country"></v-select>
                                    </v-col>
                                    <v-col cols="6" class="pt-0">
                                        <v-select v-model="selectedCountry" :items="countries"
                                            label="Select a country"></v-select>
                                    </v-col>
                                    <v-col cols="6" class="pt-0">
                                        <v-text-field v-model="additionalInfo"
                                            label="Additional Information"></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-card-actions class="flex-column justify-center align-center gap-3 mb-5">


                                    <v-btn style="border: solid 1px gray; text-transform: none;" class="w-100 "
                                        variant="elevated" elevation="0" color="blue" density="compact" height="50">
                                        Check Qut</v-btn>

                                </v-card-actions>
                                <div class="bg-grey-darken-1 w-100">
                                    <v-divider length="100%" color="black"></v-divider>
                                </div>
                                <v-card-text class="d-flex justify-space-between align-center text-subtitle-1">
                                    <span>TOTAL</span>
                                    <span class="font-weight-bold ">${{ calcTotalPrice }}</span>
                                </v-card-text>
                                <v-card-actions class="flex-column justify-center align-center gap-3 mb-5">

                                    <v-btn style="border: solid 1px gray; text-transform: none;"
                                        class="w-100 rounded-xl" variant="elevated" elevation="0" color="blue"
                                        density="compact" height="50">
                                        Proceed To Checkout</v-btn>
                                    <v-btn @click="$router.push({name:'home'})"
                                        style="border: solid 1px black; text-transform: none;"
                                        class="w-100 rounded-xl mx-0" variant="outlined" density="compact" height="50">
                                        Continue Shopping</v-btn>
                                    <!--{{ calcTotalPrice }}-->

                                </v-card-actions>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-row>
            </v-container>
        </v-card>

    </div>
</template>

<script>
import { cartStore } from "@/stores/cart";
import { mapActions, mapState } from "pinia";


export default {
    inject: ["Emitter"],
    computed: {
        ...mapState(cartStore, ["cartItems"]),
        calcTotalPrice() {
            let total = 0;
            this.cartItems.forEach((product) => {
                total +=
                    Math.ceil(product.price - product.price * (product.sale / 100)) * product.quantity

            })
            return total;
        }
    },
    data: () => ({
        selectedCountry: "",
        additionalInfo: "",
        countries: [
            "Egypt",
            "France",
            "Germany",
            "Canada",
            "Australia",
            "Japan",
            "China",
            "India",
        ]
    }),

    methods: {
        ...mapActions(cartStore, ["gitCartItems", "deleteItem"]),
        addToCart(item) {
            item.quantity = this.quantity;
            this.addItem(item);
        }

    },

};
</script>