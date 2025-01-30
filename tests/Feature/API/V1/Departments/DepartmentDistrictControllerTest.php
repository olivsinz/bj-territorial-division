<?php

use App\Models\Department;
use App\Models\District;
use App\Models\Town;

test('it returns department details with districts', function () {
    $department = Department::factory()->create([
        'name' => 'Xittoral',
    ]);

    $towns = Town::factory()->count(2)->create(['department_id' => $department->id]);

    $districts = District::factory()->count(3)->create([
        'town_id' => $towns->first()->id,
    ]);

    $response = $this->getJson('api/v1/departments/xittoral/districts');
    $response->assertStatus(200);
    $response->assertJson([
        'department' => $department->name,
        'districts' => $department->districts,
    ]);

    $response->assertHeader('Cache-Control', 'public, max-age=3600');

    $etag = md5($department->updated_at);
    $response->assertHeader('Etag', $etag);
})->todo();
