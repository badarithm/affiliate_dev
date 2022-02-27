<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AffiliateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeScreenExists()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Home');
        $response->assertSee('Please attach file with affiliate locations');
        $response->assertSee('Submit');
    }

//    public function testCannotSubmitEmptyFile()
//    {
//
//    }

    public function testIncorrectFileResultsInSomeError()
    {
        $fakeFile = UploadedFile::fake()->create('Updated affiliates.txt', 1000);
        $response = $this->post('/', array(
            'affiliate_file' => $fakeFile
        ));
        $response->assertSee('Home');
        $response->assertSee('Something went wrong');
    }
}
