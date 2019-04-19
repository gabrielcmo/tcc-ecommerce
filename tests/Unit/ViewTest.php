<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/home')->assertStatus(200);
        $this->get('/home')->assertViewHas('user');

        $this->get('/')->assertStatus(200);
        $this->get('/')->assertViewHas('products');
    }
}
