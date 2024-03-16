<template>
    <div class="shop-withus py-12 my-15">
        <div class="title">
        <h2 class="text-center">Why Shop <span>With Us?</span></h2>
</div>
        <v-container fluid>
            <v-row>
                <v-col cols="3" >
                  
                  <v-card class="text-center text-white px-2" elevation="0" style="cursor: pointer;" color="transparent">
                    <div class="parent " style="overflow: hidden; height: 100%; width: 100%; border-radius: 50%; ">
                        <img class="mx-auto" src="@/assets/images/free-shipping.png"    alt="">
                    </div>
                    <v-card-title>
                        Free Shoping On First Order
                        
                    </v-card-title>
                    <v-card-text>
                        Earum commodi aut voluptatem impedit voluptatibus minima aut. Placeat nemo nam non dignissimos.
                    </v-card-text>
                    <a href="" style="text-decoration: underline;" class=" text-white ">voluptatibus</a>
                    </v-card>
                </v-col>
                <v-col cols="3" >
                  
                  <v-card class="text-center text-white px-2" elevation="0" style="cursor: pointer;" color="transparent">
                    <div class="parent " style="overflow: hidden; height: 100%; width: 100%; border-radius: 50%; ">
                        <img class="mx-auto" src="@/assets/images/weekly-flash-sales.png"    alt="">
                    </div>
                    <v-card-title>
                        Weekly Flash Sales
                        
                    </v-card-title>
                    <v-card-text>
                        Earum commodi aut voluptatem impedit voluptatibus minima aut. Placeat nemo nam non dignissimos.
                    </v-card-text>
                    <a href="" style="text-decoration: underline;" class=" text-white ">voluptatibus</a>
                    </v-card>
                </v-col>
                <v-col cols="3" >
                  
                  <v-card class="text-center text-white px-2" elevation="0" style="cursor: pointer;" color="transparent">
                    <div class="parent " style="overflow: hidden; height: 100%; width: 100%; border-radius: 50%; ">
                        <img class="mx-auto" src="@/assets/images/discount.png"    alt="">
                    </div>
                    <v-card-title>
                       Payment Discount
                    </v-card-title>
                    <v-card-text>
                        Earum commodi aut voluptatem impedit voluptatibus minima aut. Placeat nemo nam non dignissimos.
                    </v-card-text>
                    <a href="" style="text-decoration: underline;" class=" text-white ">voluptatibus</a>
                    </v-card>
                </v-col>
                <v-col cols="3" >
                  
                  <v-card class="text-center text-white px-2" elevation="0" style="cursor: pointer;" color="transparent">
                    <div class="parent " style="overflow: hidden; height: 100%; width: 100%; border-radius: 50%; ">
                        <img class="mx-auto" src="@/assets/images/cash-back.png"    alt="">
                    </div>
                    <v-card-title>
                        Cashback Reward Program
                        
                    </v-card-title>
                    <v-card-text>
                        Earum commodi aut voluptatem impedit voluptatibus minima aut. Placeat nemo nam non dignissimos.
                    </v-card-text>
                    <a href="" style="text-decoration: underline;" class=" text-white ">voluptatibus</a>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
export default {
    data() {
        return {
           
    }
}
}
</script>
<style lang="scss">
.shop-withus{
    background-image: url(../../assets/images/why-shop-with-us-banner.webp);
        background-size: cover;
        background-repeat: repeat-x;
        h2{
            color: white;
            font-weight: 800;
            font-size: 30px;
            span{
                color: #06e4b4;
            }
        }
        .v-card{
            .v-card-title{
                white-space: pre-wrap;
                line-height: 1.2;
            }
        }

}
</style>