import router from "@/router";
import axios from "axios";

const offerStore={
    state:{
        offer:{
            data:{
                companyName:'',
                companyTitle:'',
                companyLogo:'',
                projectName:'',
                offerDescription:'',
                offerAnalysis:'',
                offerCostTitle:'',
                offerCostDescription:'',
                offerDeliveryTime:'',
                offerPrice:'',
                offerBidTime:'',
                offerColor:''
            },
            preview:false,
        } ,
        offers:[]
    },
    mutations:{
        SET_OFFER(state, offer) {
            state.offer = offer
        },
        SET_PREVIEW(state,bool){
            state.offer.preview=bool;
        },
        SET_OFFERS(state, offers) {
            state.offers = offers
        },
    },
    actions:{
        createOffer({commit }, offer) {
            axios.post('/create-offer', offer,{
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
                .then((res)=>{
                    if(res.data.success){
                        router.push({name:"listOffer"});
                    }
                })
                .catch(err=>{
                    console.log(err.response)
                })

        },
        initOffers({commit}) {
            axios.get('/offers')
                .then((res)=>{
                    console.log(res)
                    if(res.data.success){
                        commit("SET_OFFERS",res.data.data)
                    }
                })
                .catch(err=>{
                    console.log(err.response)
                })

        },
    },
    getters:{
        getOffer:state=>state.offer,
        getOffers:state=>state.offers
    }
}

export default offerStore;
