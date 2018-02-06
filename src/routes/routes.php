<?php

Route::group(['prefix' => 'budget-absorption', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\BudgetAbsorption\Http\Controllers\BudgetAbsorptionController@index',
        'create'     => 'Bantenprov\BudgetAbsorption\Http\Controllers\BudgetAbsorptionController@create',
        'store'     => 'Bantenprov\BudgetAbsorption\Http\Controllers\BudgetAbsorptionController@store',
        'show'      => 'Bantenprov\BudgetAbsorption\Http\Controllers\BudgetAbsorptionController@show',
        'update'    => 'Bantenprov\BudgetAbsorption\Http\Controllers\BudgetAbsorptionController@update',
        'destroy'   => 'Bantenprov\BudgetAbsorption\Http\Controllers\BudgetAbsorptionController@destroy',
    ];

    Route::get('/',$controllers->index)->name('budget-absorption.index');
    Route::get('/create',$controllers->create)->name('budget-absorption.create');
    Route::post('/store',$controllers->store)->name('budget-absorption.store');
    Route::get('/{id}',$controllers->show)->name('budget-absorption.show');
    Route::put('/{id}/update',$controllers->update)->name('budget-absorption.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('budget-absorption.destroy');

});

