<?php

namespace App\Repositories;

use App\Models\Specialization;

class SpecializationRepository
{
    public function createSpecialization(array $specializationDetails)
    {
        return Specialization::create($specializationDetails);
    }

    public function updateSpecialization($specializationId, array $newDetails)
    {
        return Specialization::where($specializationId)->update($newDetails);
    }

    public function deleteSpecialization($specializationId)
    {
        return Specialization::destroy($specializationId);
    }

    public function getAllSpecializations()
    {
        return Specialization::all();
    }

    public function getSpecializationById($specializationId)
    {
        return Specialization::findOrFail($specializationId);
    }
}
