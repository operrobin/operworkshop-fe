<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTranserObject\BaseResponse;

use App\Model\Workshop;

class WorkshopController extends Controller
{
    /**
     * getWorkshopByType
     * An API to get Workshop by it's type.
     * @see \App\Model\Workshop for more details
     * 
     * @param integer type
     * 
     * @return array \App\Model\Workshop::class
     */
    public function getWorkshopByType(Request $request){
        $v = validator()->make($request->all(), [
            "type" => "required"
        ]);

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        return BaseResponse::ok(
            Workshop
                ::where('bengkel_tipe', $request->get('type'))
                ->get(),
            "Success get all workshop datas."
        );
    }
}
