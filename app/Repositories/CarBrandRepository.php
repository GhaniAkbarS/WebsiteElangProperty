<?php

namespace App\Repositories;

use App\Models\CarBrand;

class CarBrandRepository {

    public function getAllCarBrand() {
        return CarBrand::all();
    }

    public function findCarBrandById($id){
        return CarBrand::findOrFail($id);
    }

    public function createCarBrand(array $data){
        return CarBrand::create($data);
    }

    public function updateCarBrand($id, array $data){
        $carBrand = CarBrand::findOrFail($id);
        return $carBrand->update($data);
    }

    public function deleteCarBrand($id){
        $carBrand = Carbrand::findOrFail($id);
        return $carBrand->delete();
    }
}
