
<template>
  <div class="app-footer">
    <v-footer class="bg-grey-lighten-4" :app="true" absolute>
    <v-container fluid class="px-0">
<v-row>
  <v-col cols="3">
    
    <v-card elevation="0" color="transparent">
      <v-card-title  class="font900  text-uppercase text-h6">Shop</v-card-title>
      <v-card-text v-for="category in categories" :key="category.title" class="pt-0 pb-5 text-grey-darken-1" >
        <router-link :to="{ name:'home'}">{{ category.title }}</router-link>

      </v-card-text>
      
    </v-card>
  </v-col>
  <v-col cols="3">
    <v-card elevation="0" color="transparent">
      <v-card-title  class="font900  text-uppercase text-h6">Further info</v-card-title>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>


    </v-card>
  </v-col>
  <v-col cols="3">
    <v-card elevation="0" color="transparent">
      <v-card-title  class="font900  text-uppercase text-h6">customer service</v-card-title>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>
      <v-card-text class="pt-0 pb-5 text-grey-darken-1">test test</v-card-text>


    </v-card>
  </v-col>

  <v-col cols="3" class="pt-5 ">
    <v-card elevation="0" color="transparent">
      <img src="@/assets/images/footer-logo.webp" alt="">
      <v-card-text style="gap: 10px;" class="pl-0 d-flex justify-center pb-1 text-grey-darken-1 pt-10"><span>
        <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
  <path   fill="#716868"
   
 d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"></path>
</svg></span>1st & 2nd Floor, Zion Building, Plot No. 273, Sector 10, Kharghar,</v-card-text>
      <v-card-text style="gap: 10px;" class="pl-0 d-flex  pb-1 text-grey-darken-1 pt-10">
        <span><svg width="15" data-prefix="fas" data-icon="envelope" viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg" ><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z" class=""></path></svg></span>
        Navi Mumbai - 410210
      </v-card-text>
      <v-card-text style="gap: 10px;" class="pl-0 d-flex  pb-1 text-grey-darken-1 pt-10">
        <span>
          <svg width="15" data-prefix="fas" data-icon="envelope" viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg" >
            <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" class=""></path>
</svg></span>        support@testbook.com
      </v-card-text>
      <v-card-text  class="pl-0">
        <div class="d-flex social justify-start gap-5 ">
          <span v-for="(svg , i) in svgs" :key="i" v-html="svg" style="height: 40px; width: 40px; cursor: pointer; border-radius: 50%;" class="facebook  bg-grey-darken-2  d-flex justify-center align-center">
          
        </span>
   
      </div>
      </v-card-text>

    </v-card>
  </v-col>
  <v-col cols="12">
    <div class="img-parent mt-11 d-flex justify-center ">
      <img src="@/assets/images/cart-page-cards.webp" class="w-50" alt="">
    </div>
  </v-col>
  <v-col cols="6">
    <div class="">
      <p>&copy; {{ new Date().getFullYear() }}</p>
      Huge Savingon UHD Televisions
    </div>
  </v-col>
</v-row>
    </v-container>
  </v-footer>
  </div>

</template>
<script>
import { mapState } from "pinia";
import  {productsModule}  from "@/stores/products";

  export default {
    computed: {
    
    ...mapState(productsModule, ['categories'])
  },
    data: () => ({
      svgs: [
          `<svg width="18"  fill="white" data-prefix="fas" data-icon="envelope" viewBox="0 0 320 512"   xmlns="http://www.w3.org/2000/svg" >

<path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>`,
`<svg width="18"  fill="white" data-prefix="fas" data-icon="envelope"  viewBox="0 0 512 512"    xmlns="http://www.w3.org/2000/svg" >

  <path d="M256,152c-57.9,0-105,47.1-105,105s47.1,105,105,105s105-47.1,105-105S313.9,152,256,152z M256,152   c-57.9,0-105,47.1-105,105s47.1,105,105,105s105-47.1,105-105S313.9,152,256,152z M437,0H75C33.6,0,0,33.6,0,75v362   c0,41.4,33.6,75,75,75h362c41.4,0,75-33.6,75-75V75C512,33.6,478.4,0,437,0z M256,392c-74.399,0-135-60.601-135-135   c0-74.401,60.601-135,135-135s135,60.599,135,135C391,331.399,330.399,392,256,392z M421,122c-16.5,0-30-13.5-30-30s13.5-30,30-30   s30,13.5,30,30S437.5,122,421,122z M256,152c-57.9,0-105,47.1-105,105s47.1,105,105,105s105-47.1,105-105S313.9,152,256,152z    M256,152c-57.9,0-105,47.1-105,105s47.1,105,105,105s105-47.1,105-105S313.9,152,256,152z M256,152c-57.9,0-105,47.1-105,105   s47.1,105,105,105s105-47.1,105-105S313.9,152,256,152z"></path>
  </svg>`,
`<svg width="18"  fill="white" data-prefix="fas" data-icon="envelope"  viewBox="0 0 18 15"  xmlns="http://www.w3.org/2000/svg" >

  <path d="M17.64 2.6a7.33 7.33 0 01-1.75 1.82c0 .05 0 .13.02.23l.02.23a9.97 9.97 0 01-1.69 5.54c-.57.85-1.24 1.62-2.02 2.28a9.09 9.09 0 01-2.82 1.6 10.23 10.23 0 01-8.9-.98c.34.02.61.04.83.04 1.64 0 3.1-.5 4.38-1.5a3.6 3.6 0 01-3.3-2.45A2.91 2.91 0 004 9.35a3.47 3.47 0 01-2.02-1.21 3.37 3.37 0 01-.8-2.22v-.03c.46.24.98.37 1.58.4a3.45 3.45 0 01-1.54-2.9c0-.61.14-1.2.45-1.79a9.68 9.68 0 003.2 2.6 10 10 0 004.08 1.07 3 3 0 01-.13-.8c0-.97.34-1.8 1.03-2.48A3.45 3.45 0 0112.4.96a3.49 3.49 0 012.54 1.1c.8-.15 1.54-.44 2.23-.85a3.4 3.4 0 01-1.54 1.94c.74-.1 1.4-.28 2.01-.54z"></path>
</svg>`,

      ],
    }),
  }
</script>
<style>
.font900{
  font-weight: 900;
}
</style>