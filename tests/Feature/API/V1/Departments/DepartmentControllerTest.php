<?php

use App\Models\Department;

test('it returns a list of departments and caches the response', function () {
    Department::factory()->count(3)->create();

    $response = $this->getJson('api/v1/departments');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*' => ['id', 'name'],
    ]);
});
