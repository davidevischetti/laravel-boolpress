<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Mail\LeadToLead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        // VALIDAZIONE
        $validation_rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:256',
            'message' => 'required|string|max:8000',
            'mailinglist' => 'required|boolean',
        ];

        // $request->validate($validation_rules);

        $validator = Validator::make($form_data, $validation_rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'response' => $validator->errors(),
            ]);
        }

        // SALVATAGGIO DB

        $lead = Lead::create($form_data);
        // INVIO EMAIL LEAD

        Mail::to($lead->email)->send(new LeadToLead());
        // INVIO EMAIL ADMIN
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
