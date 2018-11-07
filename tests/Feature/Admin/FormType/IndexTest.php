<?php

namespace Tests\Feature\Admin\FormType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/admin/form-type');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $this->get('/admin/form-type/1')
            ->assertStatus(200)
            ->assertJson([
                "name"=>'离职'
            ]);
    }
}
