<?php

Route::middleware(['auth:employee-api', 'scopes:employee', 'verified'])->group(function () {
     Route::group(['prefix' => 'master'], function () {
       
    });
});
