<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * 认证API
     */
    public function apiAuth()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');
    }
}
