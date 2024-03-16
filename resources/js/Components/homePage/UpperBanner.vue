<template>
    <div class="banner">
        <div class="parent">
            <v-row>
                <v-col cols="6">
                    <div class="cont">
                        <h3><span>Huge Saving</span>on UHD Televisions</h3>
                        <p class="hint">sale up to 70% off on selected items</p>
                        <v-btn
                        variant="outlined"
                        density="compact"
                        class="py-3 px-10 mt-8"
                        style="border-radius:30px;     height: 40px; text-transform: none ;"
                        >
                        Shop New
                        </v-btn>
                    </div>
                </v-col>
            </v-row>
        </div>
    </div>
</template>

<style lang="scss">
.banner {
    .parent {
        height: 400px;
        background-image: url(../../assets/images/banner-bg.jpg);
        background-size: cover;
        background-position: 0px top;
        .cont {
        color: white;
        padding: 50px 140px 0 100px;
        h3 {
        font-size: 45px;
        font-weight: 900;
        span {
        color:#06e4b4;
        margin-right: 10px !important;

        }
        }
        .hint {
        margin: 20px 4px;
        }
        }
    }
}
</style>