<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\BusinessResource;
use App\Http\Resources\ServiceResource;
use App\Services\Advertisement;
use App\Services\Business;
use App\Services\Service;
use App\Services\SubCategory;
use App\Services\SubSubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BazzarController extends Controller
{
    public function __construct(
        private SubCategory $subCategory,
        private SubSubCategory $subSubCategory,
        private Advertisement $advertisement,
        private Service $service,
        private Business $business
    ) {
    }
    public function home()
    {
        try {
            $subCategories = $this->subCategory->getCollection();
            $advertisements = $this->advertisement->getCollection(4);
            $advertisements = AdvertisementResource::collection($advertisements);
            $quickAdvertisements = [
                [
                    'name' => 'Real Estate',
                    'image' => '/images/real-estate.jpeg',
                    'link' => '/advertisement/list/realestate-9',
                ],
                [
                    'name' => 'Electronics',
                    'image' => '/images/electronics.webp',
                    'link' => '/advertisement/list/electronics-1',
                ],
                [
                    'name' => 'Care',
                    'image' => '/images/care.jpg',
                    'link' => '/advertisement/list/personalcare-12',
                ],
                [
                    'name' => 'Auto',
                    'image' => '/images/auto.jpg',
                    'link' => '/advertisement/list/auto-2',
                ],
            ];
            $services = $this->service->getCollection(8);
            $services = ServiceResource::collection($services);
            $businesses = $this->business->getCollection(8);
            $businesses = BusinessResource::collection($businesses);
            return response()->json(['subcategories' => $subCategories, 'advertisements' => $advertisements, 'quickadvertisements' => $quickAdvertisements, 'services' => $services, 'businesses' => $businesses], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function advertise($slug = null)
    {
        try {
            if (!$slug) {
                $advertisements = $this->advertisement->getCollection();
            } else {
                $subCategoryId = strtok($slug, '-');
                $advertisements = $this->advertisement->getCollectionByCategoryId($subCategoryId);
            }
            $adCategories = $this->subCategory->getSubCategoryByMainId(1);
            $advertisements = AdvertisementResource::collection($advertisements);
            return response()->json(['subcategories' => $adCategories, 'advertisements' => $advertisements], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function service()
    {
        try {
            $services = $this->service->getCollection();
            // $business = $this->business->getCollection();
            // $serviceCategories = $this->subCategory->getSubCategoryByMainId(3);
            $services = ServiceResource::collection($services);
            return response()->json(['services' => $services], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function business()
    {
        try {
            $businesses = $this->business->getCollection();
            // $subCategory = $this->subCategory->getSubCategoryByMainId(2);
            // $subSubCategory = $this->subSubCategory->getCollection();
            $businesses = BusinessResource::collection($businesses);
            return response()->json(['businesses' => $businesses,], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function other()
    {
        try {
            $others = [];
            return response()->json(['others' => $others,], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function newspaper()
    {
        try {
            $newspapers = [];
            return response()->json(['newspapers' => $newspapers,], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
