<?php

namespace App\Http\Controllers;

use App\Service\AuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialVkController extends Controller
{
	/**
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function redirect()
	{
		return Socialite::driver('vkontakte')->redirect();
	}

	/**
	 * @param AuthService $service
	 * @throws \Exception
	 */
	public function callback(AuthService $service)
	{
       $user = Socialite::driver('vkontakte')->user();
       return $service->login($user);
	}
}
