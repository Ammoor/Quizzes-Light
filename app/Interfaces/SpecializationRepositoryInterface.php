<?php

namespace App\Interfaces;

interface SpecializationRepositoryInterface
{
    public function createSpecialization(array $specializationDetails);
    public function updateSpecialization($specializationId, array $newDetails);
    public function deleteSpecialization($specializationId);
    public function getAllSpecializations();
    public function getSpecializationById($specializationId);
}
