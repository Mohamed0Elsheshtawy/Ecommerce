<template>
    <div class="top-cat">
        <div class="cyber-baner">
            <img src="@/assets/images/cyber-banner.webp" width="100%" alt="">
        </div>
       
        <div class="categories  pt-13">
            <div class="title  font-weight-bold d-flex justify-center align-center px-5 mb-3">
            <h1 style="font-weight: 900;" class="text-center text-h5  flex-grow-1">
                Top Categories
            </h1>
            <a href="#" style="color: #02218f; text-decoration: underline;">
                Select All
            </a>
        </div>
            <v-container fluid>
                <v-row>
                    <v-col cols="2"  v-for="cat in categories" :key="cat.title">
                  
                        <v-card class="text-center py-3px-3" elevation="0" style="cursor: pointer;">
                            <v-hover v-slot="{ isHovering, props }">
                        <div class="parent " style="overflow: hidden; height: 100%; width: 100%; border-radius: 50%; ">
                        <img :src="cat.images"
                        :style="`height: 100%;  width:100%; cursor: pointer; transition: all 0.7s ease-in-out; transform: scale(${isHovering ? 1.05 : 1})`"
                        alt=""
                        v-bind="props"
                        >
                    </div>
                        </v-hover>
                            <v-card-text class=" d-flex justify-center align-center">
                                {{ cat.title }}

                            </v-card-text>

                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categories: [

                {
                    title: "mobile phones",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/mobile-phones.png?v=10616357514144629263"
                },
                {
                    title: "Labtops",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/laptops-tablets.png?v=17546078654541140209"
                },
                {
                    title: "TVS",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/televisions.png?v=792225267698738137"
                },
                {
                    title: "PCs",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/pcs-accessories.png?v=7913320403362682840"
                },
                {
                    title: "Audio & Video",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/audio-video.png?v=17118273463527967791"
                },
                {
                    title: "Gaming",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/gaming-accessories.png?v=5365032838061682635"
                },
                {
                    title: "Home Appliances",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/home-appliances.png?v=4122646624966862882"
                },
                {
                    title: "Kitchen",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/kitchen-appliances.png?v=912885117927234410"
                },
                {
                    title: "Cameras",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/cameras.png?v=10468174360605840515"
                },
                {
                    title: "Consumables",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/consumables.png?v=1604898607781595964"
                },
                {
                    title: "Smart Homes",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/smart-homes.png?v=11511407578445752828"
                },
                {
                    title: "Accessories",
                    images: "https://new-ella-demo.myshopify.com/cdn/shop/files/accessories.png?v=16090558546215869367"
                },
            ]
        }
    },
}
</script>