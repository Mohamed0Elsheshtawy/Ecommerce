<template>
    <div class="top-offers bg-grey-lighten-4 pt-5">
        <v-container fluid >
            <v-row>
                <v-col cols="4" class="pr-4">
                    <v-hover v-slot="{ isHovering ,props }" >
                    <div class="parent " v-bind="props" style="overflow: hidden; width: 100%;     border-radius: 7px;">
                  <img src="@/assets/images/playstations.webp"  
                  :style="`width: 100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${ isHovering ?1.05 : 1 })`" alt="">
                </div>
            </v-hover>


                </v-col>
                <v-col cols="4" class="pr-4">
                    <v-hover v-slot="{ isHovering ,props }" >
                    <div class="parent " v-bind="props" style="overflow: hidden; width: 100%;     border-radius: 7px;">
                 <img src="@/assets/images/headset.webp" 
                 :style="`width: 100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${ isHovering ?1.05 : 1 })`" alt="">
                
                </div>
            </v-hover>
                </v-col>
                <v-col cols="4" class="pr-4">
                    <v-hover v-slot="{ isHovering ,props }" >
                    <div class="parent " v-bind="props" style="overflow: hidden; width: 100%;     border-radius: 7px;">
              <img src="@/assets/images/chairs.webp" 
              :style="`width: 100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${ isHovering ?1.05 : 1 })`" alt="">

              
            </div>
        </v-hover>
            </v-col>
        </v-row>

            <v-row>

            <v-col cols="6">
                <v-hover v-slot="{ isHovering ,props }" >
                    <div class="parent mt-3" v-bind="props" style="overflow: hidden; width: 100%;     border-radius: 7px;">
              <img src="@/assets/images/iphones.webp" 
              :style="`width: 100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${ isHovering ?1.05 : 1 })`"
               alt="">
            </div>
        </v-hover>

            </v-col>
            <v-col cols="6">
                <v-hover v-slot="{ isHovering ,props }" >
                    <div class="parent mt-3" v-bind="props" style="overflow: hidden; width: 100%;     border-radius: 7px;">
              <img src="@/assets/images/laptops.webp" 
              :style="`width: 100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${ isHovering ?1.05 : 1 })`"
               alt="">
            </div>
        </v-hover>

            </v-col>

            
        </v-row>
    </v-container>
</div></template>
<style>

</style>