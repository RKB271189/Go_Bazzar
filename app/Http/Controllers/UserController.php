<?php

namespace App\Http\Controllers;

use App\Helper\FileStorage;
use App\Http\Requests\User\AdvertisementImageRequest;
use App\Http\Requests\User\AdvertisementRequest;
use App\Http\Requests\User\BusinessRequest;
use App\Http\Requests\User\ProfileRequest;
use App\Http\Requests\User\ServiceRequest;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\BusinessResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\ServiceResource;
use App\Services\Advertisement;
use App\Services\AdvertisementImage;
use App\Services\Business;
use App\Services\Province;
use App\Services\Service;
use App\Services\SubCategory;
use App\Services\SubSubCategory;
use App\Services\UserProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use FileStorage;
    public function __construct(
        private Province $province,
        private UserProfile $userProfile,
        private Advertisement $advertisement,
        private AdvertisementImage $advertisementImage,
        private SubCategory $subCategory,
        private SubSubCategory $subSubCategory,
        private Service $service,
        private Business $business,
    ) {
    }
    public function fetchProfile()
    {
        try {
            $province = $this->province->getCollection();
            $user = Auth::user();
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            if ($userProfile) {
                $userProfile = new ProfileResource($userProfile);
            }
            return response()->json(['province' => $province, 'profile' => $userProfile], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function createProfile(ProfileRequest $request)
    {
        try {
            $params = $request->only('first_name', 'last_name', 'province_id', 'city_id', 'postal_code', 'contact_no');
            $user = Auth::user();
            $params['user_id'] = $user->id;
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            if ($userProfile) {
                $id = $userProfile->id;
                unset($userProfile['id']);
                unset($params['user_id']);
                $userProfile = $this->userProfile->updateCollection($params, $id);
            } else {
                $userProfile = $this->userProfile->createCollection($params);
            }
            $userProfile = new ProfileResource($userProfile);
            Log::channel('user_activity_log')->info('User with email :' . $user->email . ' created/updated profile');
            return response()->json(['message' => 'Your profile has been created successfully', 'profile' => $userProfile], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function advertisment()
    {
        try {
            $user = Auth::user();
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            if (!$userProfile) {
                return response()->json(['error' => 'Please complete your profile first.'], 422);
            }
            $advertisement = $this->advertisement->getAdvertisementByUserId($userProfile->id);
            $advertisement = AdvertisementResource::collection($advertisement);
            return response()->json(['advertisement' => $advertisement], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function singleAdvertisement($id)
    {
        try {
            $advertisement = [];
            $province = $this->province->getCollection();
            $adCategories = $this->subCategory->getSubCategoryByMainId(1);
            if ($id) {
                $advertisement = $this->advertisement->getCollectionById($id);
                $advertisement = new AdvertisementResource($advertisement);
            }
            return response()->json(['province' => $province, 'ad_categories' => $adCategories, 'advertisement' => $advertisement], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function createAdvertisement(AdvertisementRequest $request)
    {
        try {
            $user = Auth::user();
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            $params = $request->only('id', 'province_id', 'city_id', 'title', 'description', 'expiry_date', 'address', 'sub_category_id', 'price');
            $params['profile_id'] = $userProfile->id;
            if (empty($params['id']) || $params['id'] == null) {
                unset($params['id']);
                $advertisement = $this->advertisement->createCollection($params);
            } else {
                $id = $params['id'];
                unset($params['id']);
                $advertisement = $this->advertisement->updateCollection($params, $id);
            }
            $thumbNail = $request->file('thumb_nail');
            if ($thumbNail) {
                $folder = 'User/Advertisement/Thumbnail';
                $fileName = $userProfile->id . '-adv-' . $advertisement->id . '.png';
                $upload = $this->StoreImage($folder, $fileName, $thumbNail);
                if (!$upload) {
                    throw new Exception("Unable to upload thumb nail");
                }
                $params = [
                    'thumb_nail' => $folder . '/' . $fileName
                ];
                $advertisement = $this->advertisement->updateCollection($params, $advertisement->id);
            }
            Log::channel('user_activity_log')->info('User with email :' . $user->email . ' created/updated advertisement');
            return response()->json(['message' => 'Your advertisment has been created.', 'advertisement' => $advertisement], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function uploadAdvertisementImage(AdvertisementImageRequest $request)
    {
        try {
            $user = Auth::user();
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            $params = $request->only('advertisement_id');
            $images = $request->file('images');
            if ($images) {
                $folder = 'User/Advertisement/Images';
                $advertisementImage = $this->advertisementImage->getImagesByAdvertisementId($params['advertisement_id']);
                foreach ($images as $key => $image) {
                    if ($image) {
                        $advertisementImageId = 0;
                        if ($advertisementImage && isset($advertisementImage[$key])) {
                            $advertisementImageId = $advertisementImage[$key]['id'];
                        } else {
                            $advertisementImage = $this->advertisementImage->createCollection($params);
                            $advertisementImageId = $advertisementImage->id;
                        }
                        $fileName = $userProfile->id . '-adv-' . $params['advertisement_id'] . '-img-' . $advertisementImageId . '.png';
                        $upload = $this->StoreImage($folder, $fileName, $image);
                        if (!$upload) {
                            throw new Exception("Unable to upload thumb nail");
                        }
                        $this->advertisementImage->updateCollection(['image' => $folder . '/' . $fileName], $advertisementImageId);
                    }
                }
            } else {
                throw new Exception("Unable to upload images");
            }
            return response()->json(['message' => 'Images uploaded successfully'], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function others()
    {
        try {
            $user = Auth::user();
            $service = [];
            $business = [];
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            if (!$userProfile) {
                return response()->json(['error' => 'Please complete your profile first.'], 422);
            }
            $service = $this->service->getServiceByUserId($userProfile->id);
            $service = ServiceResource::collection($service);
            $business = $this->business->getBusinessByUserId($userProfile->id);
            $business = BusinessResource::collection($business);
            return response()->json(['service' => $service, 'business' => $business], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function singleService($id)
    {
        try {
            $service = [];
            $province = $this->province->getCollection();
            $serviceCategories = $this->subCategory->getSubCategoryByMainId(3);
            if ($id) {
                $service = $this->service->getCollectionById($id);
                $service = new ServiceResource($service);
            }
            return response()->json(['province' => $province, 'service_categories' => $serviceCategories, 'service' => $service], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function createService(ServiceRequest $request)
    {
        try {
            $user = Auth::user();
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            $params = $request->only('id', 'province_id', 'city_id', 'title', 'service_email', 'description', 'address', 'sub_category_id', 'service_no');
            $params['profile_id'] = $userProfile->id;
            if (empty($params['id']) || $params['id'] == null) {
                unset($params['id']);
                $service = $this->service->createCollection($params);
            } else {
                $id = $params['id'];
                unset($params['id']);
                $service = $this->service->updateCollection($params, $id);
            }
            $servicePicture = $request->file('service_picture');
            if ($servicePicture) {
                $folder = 'User/Service';
                $fileName = $userProfile->id . '-adv-' . $service->id . '.png';
                $upload = $this->StoreImage($folder, $fileName, $servicePicture);
                if (!$upload) {
                    throw new Exception("Unable to upload service picture");
                }
                $params = [
                    'service_picture' => $folder . '/' . $fileName
                ];
                $service = $this->service->updateCollection($params, $service->id);
            }
            Log::channel('user_activity_log')->info('User with email :' . $user->email . ' created/updated service');
            return response()->json(['message' => 'Your service has been created.', 'service' => $service], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function business()
    {
        try {
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function singleBusiness($id)
    {
        try {
            $business = [];
            $province = $this->province->getCollection();
            $businessCategories = $this->subCategory->getSubCategoryByMainId(2);
            $businessSubCategories = $this->subSubCategory->getCollection();
            if ($id === 'undefined') {
                $id = null;
            }
            if ($id) {
                $business = $this->business->getCollectionById($id);
                $business = new BusinessResource($business);
            }
            return response()->json([
                'province' => $province,
                'business_categories' => $businessCategories,
                'business_sub_categories' => $businessSubCategories,
                'business' => $business
            ], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function createBusiness(BusinessRequest $request)
    {
        try {
            $user = Auth::user();
            $userProfile = $this->userProfile->getProfileByUserId($user->id);
            $params = $request->only('id', 'province_id', 'city_id', 'title', 'business_email', 'description', 'address', 'sub_category_id', 'sub_sub_category_id', 'business_no');
            $params['profile_id'] = $userProfile->id;
            if (empty($params['id']) || $params['id'] == null) {
                unset($params['id']);
                $business = $this->business->createCollection($params);
            } else {
                $id = $params['id'];
                unset($params['id']);
                $business = $this->business->updateCollection($params, $id);
            }
            $businessPicture = $request->file('business_picture');
            if ($businessPicture) {
                $folder = 'User/Business';
                $fileName = $userProfile->id . '-adv-' . $business->id . '.png';
                $upload = $this->StoreImage($folder, $fileName, $businessPicture);
                if (!$upload) {
                    throw new Exception("Unable to upload business picture");
                }
                $params = [
                    'service_picture' => $folder . '/' . $fileName
                ];
                $business = $this->business->updateCollection($params, $business->id);
            }
            Log::channel('user_activity_log')->info('User with email :' . $user->email . ' created/updated business');
            return response()->json(['message' => 'Your business has been created.', 'business' => $business], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
