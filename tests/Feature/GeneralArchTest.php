<?php

describe('Global Arch QA', function () {

    test('app')
        ->expect('App')
        ->toUseStrictTypes();

    test('No debugs left behind')
        ->expect(['dd', 'dump'])
        ->not->toBeUsed();

    test('Functioning health check endpoint')
        ->getJson('/api/health')
        ->assertStatus(200)
        ->assertJson(['status' => 'ok', 'working' => true]);

    test('Every Controller has the "Controller" suffix')
        ->expect('App\Http\Controllers')
        ->toHaveSuffix('Controller');

    test('Every Controller extends App\Http\Controllers\Controller')
        ->expect('App\Http\Controllers')
        ->toExtend('App\Http\Controllers\Controller');

    test('All App\Traits are actual traits')
        ->expect('App\Traits')
        ->toBeTraits();

    test('All Models should extend Eloquent\Model')
        ->expect('App\Models')
        ->toExtend('Illuminate\Database\Eloquent\Model');

    test('All Types should be enums')
        ->expect('App\Types')
        ->toBeEnums();

    test('All Types should have "Type" suffix')
        ->expect('App\Types')
        ->toHaveSuffix('Type');

    test('All Concerns should be interfaces')
        ->expect('App\Concerns')
        ->toBeInterfaces();

    //test('Pint return no style issues', function () {
    //    $result = \Illuminate\Support\Facades\Process::run('./vendor/bin/pint --test --dirty');
    //    expect($result->successful())->toBeTrue();
    //});

    test('Responses are forbidden outside controllers')
        ->expect(['response'])
        ->toOnlyBeUsedIn('App\Http\Controllers');

});
