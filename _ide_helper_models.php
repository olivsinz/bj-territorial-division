<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Town> $towns
 * @property-read int|null $towns_count
 * @method static \Database\Factories\DepartmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection $neighborhoods
 * @property int $id
 * @property string $name
 * @property int $town_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read int|null $neighborhoods_count
 * @method static \Database\Factories\DistrictFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereTownId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereUpdatedAt($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $district_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District $district
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Database\Factories\NeighborhoodFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Neighborhood whereUpdatedAt($value)
 */
	class Neighborhood extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Neighborhood> $neighborhoods
 * @property-read int|null $neighborhoods_count
 * @method static \Database\Factories\TownFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Town whereUpdatedAt($value)
 */
	class Town extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

