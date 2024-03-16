<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
//import AppLayout from '@/Layouts/AppLayout.vue';
//import { Head } from '@inertiajs/vue3';
</script>

<template>
	<title>Ecommerce</title>

    <!--<Head title="posts" />-->
    <v-layout class="position-relative">
      <CartDrawer />
 <AppNav />
 <FixedNav />
<v-main>
    <v-container fluid style="margin-top: 170px; padding: 0;">
          <router-view/>
         <QuickView />
        <v-snackbar v-model="bar" color="green-darken-1" location="left top" max-width="300" timeout="3000">{{ itemTitle }} has been added successfully
        <template v-slot:actions>
          <v-icon @click="bar=false" size="20" class="">mdi-close</v-icon>
        </template>
        </v-snackbar>

        </v-container>
    </v-main>
<AppFooter />

</v-layout>

</template>
<script>
import AppNav from '@/Components/global/AppNav.vue';
import FixedNav from '@/Components/global/FixedNav.vue';
import AppFooter from '@/Components/global/AppFooter.vue';
import CartDrawer from '@/Components/global/CartDrawer.vue';
import QuickView from "@/Components/global/QuickView.vue";

  export default {
    inject:["Emitter"],

    components:{
      AppNav,
      FixedNav,
      AppFooter,
      CartDrawer,
     QuickView


    },
    async mounted() {
     
    this.Emitter.on("showMsg",(data)=>{
        this.itemTitle= data
        this.bar= true

     })
    
       
    },
    data(){
      return {
      bar :false,
      itemTitle :true
      }
    }
  
  }
</script>
<style lang="scss">  // Indicates that this is SCSS code (a preprocessor for CSS)
input[type="number"] {
    -moz-appearance: textfield; /* Firefox */
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button,
input[type="file"]::-webkit-file-upload-button {
    -webkit-appearance: none;
    margin: 0;
}

</style>
