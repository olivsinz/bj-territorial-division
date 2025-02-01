<?php

uses()->group('architecture');

// Globals
arch('ensure models are correct')
    ->expect('App\Models')
    ->toBeClasses()
    ->toExtend('Illuminate\Database\Eloquent\Model');

arch('ensure "App\Http" is only used in namespace "App\Http"')
    ->expect('App\Http')
    ->toOnlyBeUsedIn('App\Http');

arch('ensure preset security is ok')->preset()->security()->ignoring('md5');
arch('ensure preset php is ok')->preset()->php();
// arch('ensure preset laravel is ok')->preset()->laravel();

// Strict types
test('ensure all files within App\Services use strict types')
    ->expect('App\Services')
    ->toUseStrictTypes();

arch('ensure provided namespaces here use strict types')
    ->expect([
        'App\Http',
        'App\Console',
        'Database\State',
        'Database\Seeders',
        'Database\Factory',
    ])
    ->toUseStrictTypes()
    ->ignoring(['App\Traits\HandleFiles']);

// Traits
test('ensure that all files within App\Traits namespace are traits')
    ->expect('App\Traits')
    ->toBeTraits();

// App\Actions
test('ensure all files within App\Actions are classes')
    ->expect('App\Actions')
    ->toBeClasses();

// App\Rules
test('ensure all files within App\Rules implement "Illuminate\Contracts\Validation\ValidationRule"')
    ->expect('App\Rules')
    ->toImplement('Illuminate\Contracts\Validation\ValidationRule');

// App\Models
test('ensure all files within App\Models are classes')
    ->expect('App\Models')
    ->toBeClasses();

test('ensure that globals functions like request() are not used within App\Models namespace')
    ->expect('request')
    ->not->toBeUsedIn('App\Models');

// App\Services
test('ensure all files within App\Services are classes')
    ->expect('App\Services')
    ->toBeClasses();

test('ensure that globals functions like request() are not used within App\Services namespace')
    ->expect('request')
    ->not->toBeUsedIn('App\Services');

test('ensure that globals functions like response() are not used within App\Services namespace')
    ->expect('response')
    ->not->toBeUsedIn('App\Services');

test('ensure that Illuminate\Http\Request classes are not used in App\Services namespace')
    ->expect('Illuminate\Http\Request')
    ->not->toBeUsedIn('App\Services');

test('ensure that all files within App\Services namespace have suffix "Service"')
    ->expect('App\Services')
    ->toHaveSuffix('Service');

// Controllers
test('ensure that all files within App\Http\Controllers are classes')
    ->expect('App\Http\Controllers')
    ->toBeClasses();

test('ensure that all files within App\Http\Controllers have suffix "Controller"')
    ->expect('App\Http\Controllers')
    ->toHaveSuffix('Controller');

test('ensure all files within App\Http\Controllers extend "App\Http\Controllers\Controller"')
    ->expect('App\Http\Controllers')
    ->toExtend("App\Http\Controllers\Controller");

// Requests
test('ensure that all files within App\Http\Requests have suffix "Request"')
    ->expect('App\Http\Requests')
    ->toHaveSuffix('Request');

test('ensure all files within App\Http\Requests extend "Illuminate\Foundation\Http\FormRequest"')
    ->expect('App\Http\Requests')
    ->toExtend("Illuminate\Foundation\Http\FormRequest");

// App\Http\Middleware
test('ensure all files within App\Http\Middleware are classes')
    ->expect('App\Http\Middleware')
    ->toBeClasses();

// Providers
test('ensure that all files within App\Providers namespace have suffix "Provider"')
    ->expect('App\Providers')
    ->toHaveSuffix('Provider');

test('ensure all files within App\Providers extend "Illuminate\Support\ServiceProvider"')
    ->expect('App\Providers')
    ->toExtend("Illuminate\Support\ServiceProvider");

// Databases
test('ensure that all files within Database\Factories have suffix "Factory"')
    ->expect('Database\Factories')
    ->toHaveSuffix('Factory');

test('ensure that all files within Database\Seeders have suffix "Seeder"')
    ->expect('Database\Seeders')
    ->toHaveSuffix('Seeder');
