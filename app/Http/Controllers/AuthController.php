<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Auth\ChangePassword;
use App\Http\Requests\User\Auth\SendCodeRequest;
use App\Http\Requests\User\Auth\UserCreateRequest;
use App\Http\Requests\User\Auth\UserVerifyRequest;
use App\Mail\CreateAccount;
use App\Mail\SendCode;
use App\Services\User;
use App\Services\UserCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct(private UserCode $userCode, private User $user)
    {
    }
    //Send 5 character code to email
    /**
     * @OA\Post(
     *      path="/api/send/code",
     *      tags={"User email verify"},
     *      summary="Sending 5 character code to user provided email",     
     *      description="Sending 5 character code to user provided email",
     *     @OA\RequestBody(
     *     required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "email":"demo@gmail.com"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Code sent successfully")
     *          )
     *       ),
     *     )
     */
    public function sendCode(SendCodeRequest $request)
    {
        try {
            $params = $request->only('email', 'forgot');
            $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
            $params['code'] = $code;
            if ($userCode = $this->userCode->validateEmail($params['email'])) {
                $this->userCode->updateCollection($params, $userCode->id);
            } else {
                $this->userCode->createCollection($params);
            }
            if (array_key_exists('forgot', $params)) {
                if (!$this->user->validateEmail($params['email'])) {
                    return response()->json(['error' => 'You are not registered user'], 401);
                }
            }
            Log::channel('user_activity_log')->info('User with email :' . $params['email'] . ' trying to send code :' . $code);
            Mail::to($params['email'])->send(new SendCode($code));
            return response()->json(['message' => 'Code sent successfully'], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    //Creating user account
    /**
     * @OA\Post(
     *      path="/api/create/account",
     *      tags={"User create account"},
     *      summary="Creating/Registering user",     
     *      description="Creating/Registering user",
     *     @OA\RequestBody(
     *     required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="code",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     * 
     *                 ),
     *                 example={
     *                     "email":"demo@gmail.com",
     *                     "code":"XYZAB",
     *                     "password":"123abc@"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Your account has been created successfully")
     *          )
     *       ),
     *     )
     */
    public function createAccount(UserCreateRequest $request)
    {
        try {
            $params = $request->only('email', 'code', 'password');
            $params['password'] = Hash::make($params['password']);
            $code = $params['code'];
            if (!($this->userCode->validateCode($params['email'], $code))) {
                return response()->json(['error' => 'The code given is invalid'], 400);
            } else {
                unset($params['code']);
                $this->user->createCollection($params);
                Log::channel('user_activity_log')->info('User with email :' . $params['email'] . ' created account');
                Mail::to($params['email'])->send(new CreateAccount($params['email']));
                return response()->json(['message' => 'Your account has been created successfully'], 200);
            }
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    //Verifying registered user
    /**
     * @OA\Post(
     *      path="/api/verify/account",
     *      tags={"User verify account"},
     *      summary="Verify register user",     
     *      description="Verify register user",
     *     @OA\RequestBody(
     *     required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="remember",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     * 
     *                 ),
     *                 example={
     *                     "email":"demo@gmail.com",
     *                     "remember":"on",
     *                     "password":"123abc@"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="You have logged in successfully")
     *          )
     *       ),
     *     )
     */
    public function verifyAccount(UserVerifyRequest $request)
    {
        try {
            $params = $request->only('email', 'password', 'remember');
            $remember = boolval($params['remember']);
            unset($params['remember']);
            if (Auth::attempt($params, $remember)) {
                Log::channel('user_activity_log')->info('User with email :' . $params['email'] . ' logged in');
                $user = Auth::user();
                $userId = $user->id;
                $token = $user->createToken($userId . '' . $params['email']);
                return response()->json(['token' => $token->plainTextToken, 'message' => 'You have logged in successfully'], 200);
            } else {
                return response()->json(['error' => 'You have provided invalid credentials'], 401);
            }
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function changePassword(ChangePassword $request)
    {
        try {
            $params = $request->only('email', 'code', 'password', 'confirmPassword');
            if ($params['password'] !== $params['confirmPassword']) {
                return response()->json(['error' => 'Password and confirm password does not match'], 422);
            } else {
                if (!($this->userCode->validateCode($params['email'], $params['code']))) {
                    return response()->json(['error' => 'The code given is invalid'], 400);
                } else {
                    $user = $this->user->validateEmail($params['email']);
                    $this->user->updateCollection(['password' => $params['password']], $user->id);
                    return response()->json(['message' => 'Password updated successfully'], 200);
                }
            }
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    public function logout()
    {
        try {
            Auth::logout();
            return response()->json(['message' => 'You have logged out successfully'], 200);
        } catch (Exception $ex) {
            Log::channel('user_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
