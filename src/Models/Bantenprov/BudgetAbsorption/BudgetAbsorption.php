<?php

namespace Bantenprov\BudgetAbsorption\Models\Bantenprov\BudgetAbsorption;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetAbsorption extends Model
{

    protected $table = 'budget_absorptions';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\BudgetAbsorption\Models\Bantenprov\BudgetAbsorption\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\BudgetAbsorption\Models\Bantenprov\BudgetAbsorption\Regency','id','regency_id');
    }

}

