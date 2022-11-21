<?php

namespace Services\DonateTests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use Tests\TestCase;

class ShowDonateFTests extends TestCase
{
  use RefreshDatabase, CreatesApplication;
  private $uri = 'api/v1/donate/{id}';
  protected function setUp(): void
  {
      parent::setUp();
  }

  /**
   *
   * @group Donate
   * @return void
   */
  public function testGETSuccessTest(): void
  {
    $response = $this->json('GET', $this->uri);
    $response->assertStatus(200);
  }
  /**
   *
   * @group Donate
   * @return void
   */
  public function testGETFaildTest(): void
  {
    $response = $this->json('GET', $this->uri);
    $response->assertStatus(400);
  }

}
