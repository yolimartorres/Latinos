<?php
namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FxRate;
use App\FxRateHistory;
use Storage;

class FxRatesController extends Controller
{
    
    public function index()
    {
        $fx_rates = FxRate::paginate(5);
        return view('administration.fx_rates.index')
            ->with('fx_rates', $fx_rates);
    }

    public function create()
    {
        $json = Storage::disk('local')->get('common-currencies.json');
        $currencies = json_decode($json, true);

        return view('administration.fx_rates.create')
            ->with('currencies', $currencies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency_code'=>'required|unique:fx_rates,currency_code,NULL,id,deleted_at,NULL',
            'fx_rate'=>'required'
          ]);


        $fx_rate = FxRate::create($request->all());

        flash(__('messages.entity_created', ['name' => __('messages.fx_rate')]))->success()->important();
        return redirect()->route('administration.fx_rates.index');

    }

    public function edit($id) 
    {
        $fx_rate = FxRate::find($id);

        if($fx_rate === null) {
            return abort(404);
        }

        $json = Storage::disk('local')->get('common-currencies.json');
        $currencies = json_decode($json, true);


        return view('administration.fx_rates.edit')
            ->with('fx_rate', $fx_rate)
            ->with('currencies', $currencies);
    }

    public function update(Request $request, $id)
    {
        $fx_rate = FxRate::find($id);

        if($fx_rate === null) {
            return abort(404);
        }

        $request->validate([
            'currency_code'=>'required|unique:fx_rates,currency_code,'.$id.',id,deleted_at,NULL',
            'fx_rate'=>'required'
          ]);

          $fx_rate->update($request->all());
        
        flash(__('messages.entity_updated', ['name' => __('messages.fx_rate')]))->success()->important();
        return redirect()->route('administration.fx_rates.index');
        

    }

    public function destroy($id)
    {
        $fx_rate = FxRate::find($id);
        $fx_rate->delete();

        flash(__('messages.entity_deleted', ['name' => __('messages.fx_rate')]))->error()->important();
        return redirect()->route('administration.fx_rates.index');
        
    }

    public function history() {
        $fx_rates_history = FxRateHistory::orderBy("country_datetime", "desc")->paginate(5);
        return view('administration.rates.history')
                ->with('fx_rates_history', $fx_rates_history);
    }
    public function history_destroy($id) {

        $fx_rate_history = FxRateHistory::find($id);
        $fx_rate_history->delete();

        return redirect()->route('administration.rates.history');
    }
}
