<template>
    <div>
        <section class="container preview-bid" :class="{'d-block':offer.preview}">
            <button class="close-btn" @click="closePreview">
                <svg xmlns="http://www.w3.org/2000/svg" :style="{ fill:offer.data.offerColor }" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="row main-container">
                <div class="col-2">
                    <p class="reversed-text-p" :style="{ color:offer.data.offerColor }">{{offer.data.companyName}}</p>
                </div>
                <div class="col-10">
                    <div class="heading-container">
                        <div class="text-container">
                            <h3 :style="{ color:offer.data.offerColor } ">{{offer.data.projectName}}</h3>

                        </div>
                        <div class="company-img-container">
                            <img style="width: 100%;height: 100%" :src="returnUrl(offer.data.companyLogo)" alt="">
                        </div>
                    </div>
                    <div class="info-box">
                        <div class="row">
                            <div class="col-1 info-ball">
                                <svg  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" :style="{ fill:offer.data.offerColor }">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="col-11 info-text-container">
                                <p v-html="offer.data.offerDescription">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="listing-requirements">
                        <div class="sub-head-text">
                            <h4 :style="{'color':offer.data.offerColor }">Gereklilik Analizi</h4>
                        </div>
                        <div class="list-numbers-texts" v-html="offer.data.offerCostDescription">
                        </div>
                    </div>
                    <div class="requirements">
                        <div class="sub-head-text">
                            <h4 :style="{'color':offer.data.offerColor }">Sizden Talep Ettiklerimiz</h4>
                        </div>
                        <div class="info-box">
                            <div class="row">
                                <div class="col-1 info-ball">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" :style="{ fill:offer.data.offerColor }">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="col-11 info-text-container">
                                    <p>
                                        {{offer.data.requestTitle}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="ul-list" v-html="offer.data.requestDescription">

                        </div>
                    </div>
                    <div class="requirements invoices">
                        <div class="sub-head-text">
                            <h4 :style="{ color:offer.data.offerColor }" >Bağımsız Maaliyetler</h4>
                        </div>
                        <div class="info-box">
                            <div class="row">
                                <div class="col-1 info-ball">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" :style="{ fill:offer.data.offerColor }">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="col-11 info-text-container">
                                    <p>
                                        <!--                                    Geliştiriciden bağımsız olarak oluşabilecek maliyetler. (Ek kalemler olabilir, genel bilgilendirme amaçlı yazılmıştır.)-->
                                        {{offer.data.offerCostTitle}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ul-list"  v-html="offer.data.offerCostDescription">

                        </div>
                    </div>
                    <div class="pricing">
                        <div class="sub-head-text">
                            <h4 :style="{ color:offer.data.offerColor }">Teklif</h4>
                        </div>
                        <table>
                            <tr :style="{'background':offer.data.offerColor }">
                                <th :style="{'background':offer.data.offerColor }">Fiyat</th>
                                <th :style="{'background':offer.data.offerColor }">Teslim Süresi</th>
                                <th :style="{'background':offer.data.offerColor }" >Fiyat Geçerlilik Süresi</th>
                            </tr>
                            <tr>
                                <td>   {{offer.data.offerPrice}}</td>
                                <td>   {{offer.data.offerBidTime}}</td>
                                <td>   {{offer.data.offerDeliveryTime}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="credits-footer">
                        <div class="page-info-container">
                            <p>{{offer.data.companyName}}</p>
                            <p>1</p>
                        </div>
                        <div class="date">
                            <span>10.15.2022</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "OfferPreview",
    computed:{
        ...mapGetters({offer:"getOffer"})
    },
    methods:{
        closePreview(){
            this.$store.commit("SET_OFFER",{data:{},preview:false});
        },
        returnUrl(file){
            if(!file) return "default.png"
            if(typeof file!="string"){
                return  URL.createObjectURL(file)
            }else{
                return file;
            }

        }
    }
}
</script>

<style scoped>

</style>
