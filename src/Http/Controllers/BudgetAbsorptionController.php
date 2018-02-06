<?php namespace Bantenprov\BudgetAbsorption\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\BudgetAbsorption;

/* Models */
use Bantenprov\BudgetAbsorption\Models\Bantenprov\BudgetAbsorption\BudgetAbsorption as PdrbModel;
use Bantenprov\BudgetAbsorption\Models\Bantenprov\BudgetAbsorption\Province;
use Bantenprov\BudgetAbsorption\Models\Bantenprov\BudgetAbsorption\Regency;

/* etc */
use Validator;

/**
 * The BudgetAbsorptionController class.
 *
 * @package Bantenprov\BudgetAbsorption
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BudgetAbsorptionController extends Controller
{

    protected $province;

    protected $regency;

    protected $budget_absorption;

    public function __construct(Regency $regency, Province $province, PdrbModel $budget_absorption)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->budget_absorption     = $budget_absorption;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $budget_absorption = $this->budget_absorption->find($id);

        return response()->json([
            'negara'    => $budget_absorption->negara,
            'province'  => $budget_absorption->getProvince->name,
            'regencies' => $budget_absorption->getRegency->name,
            'tahun'     => $budget_absorption->tahun,
            'data'      => $budget_absorption->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->budget_absorption->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->budget_absorption->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

