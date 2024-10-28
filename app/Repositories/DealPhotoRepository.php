<?php

use App\Repositories;

use App\Models\DealPhoto;


class DealPhotoRepository{
    public function getAllDealPhotos(){
        return DealPhoto::all();
    }

    public function getDealPhotosByDealId($dealId){
        return DealPhoto::where('deal_id', $dealId)->get();
    }

    public function createDealPhoto(array $data){
        return DealPhoto::creat($data);
    }

    public function deleteDealPhoto($id){
        $dealPhoto = DealPhoto::findOrFail($id);
        return $dealPhoto->delet();
    }
}
