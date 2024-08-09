<?php

describe('Project Arch QA', function () {
    test('Every App\Models\Tenant should use Tenantable trait')
        ->expect('App\Models\Tenant')
        ->toHaveMethod('bootTenantable');
});
