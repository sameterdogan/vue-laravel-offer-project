<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function createOffer(Request $request){
        $validator= Validator::make($request->all(),[
            'company_name' => 'required',
            'company_sub_title' => 'required',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'offer_project_name' => 'required',
            'offer_description' => 'required',
            'offer_requirement_analysis' => 'required',
            'offer_cost_title' => 'required',
            'offer_cost_description' => 'required',
            'offer_delivery_time' => 'required',
            'offer_price' => 'required',
            'offer_bid_time' => 'required',
            'offer_request_description' => 'required',
            'offer_request_title' => 'required',
            'offer_color' => 'required',
        ]);
        if($validator->fails()){
            $response=[
                'success'=>false,
                'message'=>$validator->errors()
            ];
            return response()->json($response,400);
        }
        $image_path = $request->file('file')->store('image', 'public');
        $input=[];
        $input['user_id']=Auth::user()->id;
        $input['company_name']=$request->company_name;
        $input['company_sub_title']=$request->company_sub_title;
        $input['company_logo']= $image_path;
        $input['offer_project_name']=$request->offer_project_name;
        $input['offer_cost_title']=$request->offer_cost_title;
        $input['offer_bid_time']=$request->offer_bid_time;
        $input['offer_price']=$request->offer_price;
        $input['offer_requirement_analysis']=$request->offer_requirement_analysis;
        $input['offer_delivery_time']=$request->offer_delivery_time;
        $input['offer_cost_description']=$request->offer_cost_description;
        $input['offer_description']=$request->offer_description;
        $input['offer_color']=$request->offer_color;
        $input['offer_request_description']=$request->offer_request_description;
        $input['offer_request_title']=$request->offer_request_title;
/*         $input['offer_bidder_company']=$request->offer_bidder_company; */
        $offer= Offer::create($input);
        $success['offer']=$offer;
        ini_set('max_execution_time', 300);
       $pdf = PDF::loadView('offer_pdf', [
            'companyName'=>$offer->company_name,
            'companyTitle'=>$offer->company_title,
            'companyLogo'=>$offer->company_logo,
            'projectName'=>$offer->project_name,
            'offerCostTitle'=>$offer->offer_cost_title,
            'offerBidTime'=>$offer->offer_bid_time,
            'offerPrice'=>$offer->offer_price,
            'offerAnalysis'=>$offer->offer_analysis,
            'offerDeliveryTime'=>$offer->offer_delivery_time,
            'offerCostDescription'=>$offer->offer_cost_description,
            'offerDescription'=>$offer->offer_description,
            'offerColor'=>$offer->offer_color,
            'requestDescription'=>$offer->request_description,
            'requestTitle'=>$offer->request_title,
        ])
            ->setPaper('a4','landscape')
            ->setWarnings(false);
        $content = $pdf->download()->getOriginalContent();
        Storage::put("public/pdf/".$offer['slug'].".pdf",$content);

        // $output = $pdf->output();
        //  dd($output);*/


        $response=[
            'success'=>true,
            'data'=>$success,
            'message'=>"Teklif Başarıyla Oluşturuldu."
        ];




        return  response()->json($response,200);
    }



    public function getOffers(Request $request){

        $offers=Offer::where("user_id",$request->user()->id)->with("user")->get();

        $success=[
            "success"=>true,
            'message'=>"Teklifler Başarıyla Listelendi",
            'data'=>$offers
        ];
        return $success;

    }
}
