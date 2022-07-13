<?php

namespace Tests\Feature;

use App\Models\Site;
use App\Models\User;
use App\Services\SiteUserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiteUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_check_sign_in_status()
    {
        $user = User::make([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'mobile' => '07545677898',
            'sub_contractor' => 1,
            'vehicle_make' => 'vauxhall',
            'vehicle_reg' => 'FN56 6FG',
            'cscs_number' => '80798767',
        ]);

        $checkStatus = $this->siteUserService->checkSignInStatus($$user);
        dd($checkStatus);
        $this->assertTrue($checkStatus === true);
    }
}
