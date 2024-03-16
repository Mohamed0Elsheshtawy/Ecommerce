<template>
  <div class="home">
     <UpperBanner />
     <TheFeatures />
     <TopOffers />
     <ProductSwiper :products="flashDeals" title="Flash Deals" titleColor="red"/>
     <TopCategories />
     <NewProducts :products="NewProduct" />
     <QualityFeatures />
     <v-container fluid>
            <v-row>
                <v-col cols="6" class="pr-3">
                  <img src="@/assets/images/band-left-cover.webp" class="w-100" alt="">
                </v-col>
                <v-col cols="6" class="pl-3">
                  <img src="@/assets/images/band-right-cover.webp" class="w-100" alt="">
                </v-col>
            </v-row>
      </v-container>
     <ProductSwiper :products="MobilePhones" title="Mobile Phones" titleColor="indigo-darken-4"/>
     <!--<img src="@/assets/images/tv-banner.webp" class="w-100" alt="">-->
     <ShopWithUs />

  </div>
</template>
<script>
import  UpperBanner  from "../Components/homePage/UpperBanner.vue"
import  TheFeatures  from "../Components/homePage/TheFeatures.vue"
import  TopOffers  from "../Components/homePage/TopOffers.vue"
import  ProductSwiper  from "../Components/homePage/ProductSwiper.vue"
import  {productsModule}  from "@/stores/products";
import { mapActions ,mapState } from "pinia";
import TopCategories from "@/Components/homePage/TopCategories.vue";
import NewProducts from "@/Components/homePage/NewProducts.vue";
import QualityFeatures from "@/Components/homePage/QualityFeatures.vue";
import ShopWithUs from "@/Components/homePage/ShopWithUs.vue";
export default {
  //name:'home',
  components:{
    UpperBanner,
    TheFeatures,
    TopOffers,
    ProductSwiper,
    TopCategories,
    NewProducts,
    QualityFeatures,
    ShopWithUs
},
  computed:{
    ...mapState( productsModule,["flashDeals","NewProduct","MobilePhones"]),
  },
  mounted(){
    this.getProducts();
    //console.log(this.flashDeals ,"jjjjjjjjjjjjjjjjjj"); 
  },
methods: {
 ...mapActions( productsModule,["getProducts"])
 
},
}

</script>