<template>
    <div>
        <section class="admin-template-holder container">
            <form @submit="submit">
                <div  class="row" >
                    <div class="company-header col-6 d-flex flex-column mb-4">
                        <label for="company-name">
                            Şirket İsmi
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Şirketinizin adı
                                </p>
                            </div>
                        </label>
                        <input type="text" id="company-name" class="bid-inputs" name="company_name" v-model="offer.company_name">
                    </div>
                    <div class="company-header col-6 d-flex flex-column mb-4">
                        <label for="company-sub-p">
                            Şirket Alt Başlık
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Başlıkta gözükecek açıklama
                                </p>
                            </div>
                        </label>
                        <input type="text" id="company-sub-p" class="bid-inputs" name="company_sub_title" v-model="offer.company_sub_title">
                    </div>
                    <div class="company-header col-6 d-flex flex-column mb-4">
                        <label for="company-sub-p">
                            Şirket Logosu
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Teklif yollayacağınız şirketin logosu
                                </p>
                            </div>
                        </label>
                        <div class="file">
                            <div class="file__input" id="file__input">
                                <input class="file__input--file" id="customFile" type="file"  name="file" @change="selectOfferFile"/>
                                <label class="file__input--label" for="customFile" data-text-btn="Yükle">Resim Yükleyin</label>
                            </div>
                        </div>
                    </div>
                    <div class="company-header col-6 d-flex flex-column mb-4">
                        <label for="company-bid-name">
                            Teklif Verilen Proje İsmi
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Teklif yollayacağınız şirketin adı
                                </p>
                            </div>
                        </label>
                        <input type="text" id="company-bid-name" class="bid-inputs" name="offer_project_name" v-model="offer.offer_project_name">
                    </div>
                    <div class="company-header">
                        <label for="company-sub-p">
                            Teklif Açıklama
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Teklifinizin açıklaması
                                </p>
                            </div>
                        </label>
<!--                        <ckeditor  id="bid-description" tag-name="textarea"  :editor="editor"  v-model="offer.offerDescription" :config="offerDescriptionConfig"></ckeditor>-->

                        <quill-editor
                            id="bid-price-desc"
                            v-model="offer.offer_description"
                            :options="snowOption"
                        />
                    </div>
                    <div class="company-header my-5">
                        <label>
                            Gereklilik Analizi
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Gereklilik Analizi
                                </p>
                            </div>
                        </label>
<!--                        <ckeditor  id="bid-required-analyze" tag-name="textarea" :editor="editor"  v-model="offer.offerAnalysis" :config="offerAnalysisConfig"></ckeditor>-->


                        <quill-editor
                            id="bid-price-desc"
                            v-model="offer.offer_requirement_analysis"
                            :options="snowOption"
                        />
                    </div>

                    <div class="company-header mb-3 col-12">
                        <label for="company-sub-p-2">
                            Sizden Talep Ettiklerimiz Üst Yazı
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Sizden Talep Ettiklerimiz Üst Yazı
                                </p>
                            </div>
                        </label>
                        <input  type="text" id="company-sub-p-2" class="bid-inputs w-100" name="offer_request_title" v-model="offer.offer_request_title">
                    </div>
                    <div class="company-header mb-4">
                        <label for="bid-price-desc">
                            Sizden Talep Ettiklerimiz
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Sizden Talep Ettiklerimiz
                                </p>
                            </div>
                        </label>
<!--                        <ckeditor  id="bid-price-desc"  tag-name="textarea" :editor="editor"  v-model="offer.requestDescription" :config="requestDescriptionConfig"></ckeditor>-->

                        <quill-editor
                            id="bid-price-desc"
                            v-model="offer.requestDescription"
                            :options="snowOption"
                        />


                    </div>

                    <div class="company-header mb-3 col-12">
                        <label for="company-sub-p-2">
                            Bağımsız Maliyetler Üst Yazı
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Teklif yollayacağınız şirketin adı
                                </p>
                            </div>
                        </label>
                        <input  type="text" id="company-sub-p-2" class="bid-inputs w-100" name="offer_cost_title" v-model="offer.offer_cost_title">
                    </div>
                    <div class="company-header mb-4">
                        <label for="bid-price-desc">
                            Bağımsız Maliyetler Açıklama
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="info-tooltip">
                                <p class="info-tooltip-header">
                                    Teklif yollayacağınız şirketin adı
                                </p>
                            </div>
                        </label>
<!--                        <ckeditor  id="bid-price-desc"  tag-name="textarea" :editor="editor"  :config="offerCostDescriptionConfig"></ckeditor>-->

                        <quill-editor
                            id="bid-price-desc"
                            v-model="offer.offerCostDescription"
                            :options="snowOption"
                        />


                    </div>
                </div>
                <div class="company-header gx-4 row">
                    <label for="company-sub-p">
                        Teklif
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <div class="info-tooltip">
                            <p class="info-tooltip-header">
                                Teklif yollayacağınız şirketin adı
                            </p>
                        </div>
                    </label>
                    <div class="d-flex gx-3 align-items-center">
                        <div>
                            <input placeholder="Teslim süresi"  type="text" id="company-sub-p" class="bid-inputs col-12" name="offer_bid_time" v-model="offer.offer_bid_time">
                        </div>
                        <div class="mx-3">
                            <input placeholder="Fiyat" type="text" id="company-sub-p" class="bid-inputs col-12 "  name="offer_price" v-model="offer.offer_price">
                        </div>
                        <div>
                            <input placeholder="Teklif geçerlilik süresi" type="text" id="company-sub-p" name="offer_delivery_time" class="bid-inputs col-12" v-model="offer.offer_delivery_time">
                        </div>
                        <div>
                            <input style="height: 45px;width: 250px"  placeholder="Teklif Rengi" type="color" id="company-sub-p" name="offer_color" class="bid-inputs col-12 mx-3" v-model="offer.offer_color">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-left my-4">
                    <button type="submit" class="create-bid">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Teklif Oluştur
                    </button>
                    <button type="button" class="create-bid prev-bid mx-3" @click="showPreview">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Teklifi Önizle
                    </button>
                </div>

            </form>

        </section>
        <OfferPreview/>
    </div>
</template>

<script>

// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import OfferPreview from "@/components/OfferPreview.vue";
import { quillEditor } from 'vue-quill-editor'
// eslint-disable-next-line
import 'quill/dist/quill.core.css'
// eslint-disable-next-line
import 'quill/dist/quill.snow.css'
// eslint-disable-next-line
import 'quill/dist/quill.bubble.css'

export default {
    name: "CreateOffer",
    components: {OfferPreview,quillEditor},
    data(){
        return {
            editor: "ClassicEditor",
            requestDescriptionConfig:{

            },
            offerDescriptionConfig: {

            },
            offerAnalysisConfig: {

            },
            offerCostDescriptionConfig: {

            },
            offer:{
                company_name:'',
                company_sub_title:'',
                companyLogo:'',
                offer_project_name:'',
                offer_description:'',
                offer_requirement_analysis:'',
                offer_cost_title:'',
                offer_cost_description:'',
                offer_delivery_time:'',
                offer_price:'',
                offer_bid_time:'',
                offerColor:'#000000',
                offer_request_description:'',
                offer_request_title:''
            },
            //custom
            snowOption: {
                theme: 'snow',
            },
           content:''

        }
    },
    methods:{
        submit(e){
            e.preventDefault();
            const offer=new FormData(e.target)
            offer.append("offer_requirement_analysis",this.offer.offerAnalysis)
            offer.append("offer_cost_description",this.offer.offerCostDescription)
            offer.append("offer_description",this.offer.offerDescription)
            offer.append("offer_request_description",this.offer.requestDescription)
            this.$store.dispatch("createOffer",offer);
        },
        showPreview(){
            this.$store.commit("SET_OFFER",{data:this.offer,preview:true});
        },
        selectOfferFile(event){
            console.log(event.target.files)
            this.offer.companyLogo=event.target.files[0];
        }
    }
}
</script>

<style >
.ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners{
    min-height: 150px;
}
.ck.ck-label{
    display: none !important;
}

</style>
