<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/pdf_tables.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <img src="{{ public_path('images/logoAutomatyco3.png') }}" width="30%" height="150%" style="text-align: left;"/>
    </header>
    <footer>
        <p>Av. 5 de Mayo #15 Bod. #8 Colonia San Juan de Ocotan. Tel/Fax: (33) 3120-1000 C.P. 45019, Zapopan, Jalisco</p>
        <p>R.F.C. AMC-030901-P69</p>
    </footer>
<br>
<br>    
    <div>
        <table id=customers3>
            <thead>
                <b><legend>{{ __('Customer')}}</legend></b>
            </thead>
            <br><br>
            <tbody>
                <tr>
                    <th>
                        <b>{{ __('Name') }}:</b> {{ $service->serviceOrder->ticket->customer->name }}<br>
                        <b>{{ __('Contact') }}:</b> {{ $service->serviceOrder->ticket->contact->name }} {{ $service->serviceOrder->ticket->contact->last_name }}<br>
                        <b>{{ __('Contacts phone') }}:</b> {{ $service->serviceOrder->ticket->contact->phone }}<br>
                        <b>{{ __('Customers phone') }}:</b> {{ $service->serviceOrder->ticket->customer->phone }}<br>
                    </th>
                    <th>
                        <b>{{ __('Ticket') }}:</b> {{ $service->serviceOrder->ticket->ticket_id }}<br>
                        <b>{{ __('Order') }}:</b> {{ $service->serviceOrder->service_order_id }}<br>
                        <b>{{ __('Service Address') }}:</b> {{ $service->serviceOrder->ticket->customer->address }}<br>
                        <b>{{ __('Date') }}:</b> {{ \Carbon\Carbon::parse($service->data_service)->format('d/m/Y') }}
                        <b></b> 
                    </th>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div>
        <h3>{{ __('Reports')}}</h3>
        <table id="customers3">
           <tr>
                <td>
                    <b>* {{ __('Type of maintenance')}}: </b> {{$service->serviceOrder->typeMaintenance->name}}.
                </td>
                <td>
                    <b>* {{ __('Type of service')}}: </b> {{$service->serviceOrder->typeService->name}}.
                </td>
            </tr>
        </table>
    </div>
    <b><legend>{{ __('Schedule')}}</legend></b>
    <br>
    <br>
    <div>
        <table id="customers2">
            <thead>
                <tr>
                    <th>{{ __('Time entry')}}</th>
                    <th>{{ __('Completion')}}</th>
                    <th>{{ __('Lunchtime')}}</th>
                    <th>{{ __('Service hour')}}</th>
                    <th>{{ __('Service extra')}}</th>
                    <th>{{ __('Duration travel')}}</th>
                    <th>{{ __('Date service')}}</th>
                    <th>{{ __('Employee')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($serviceReports as $serviceReport)
                    <tr>
                        <td>{{ $serviceReport->time_entry }}</td>
                        <td>{{ $serviceReport->time_completion }}</td>
                        <td>{{ $serviceReport->lunchtime }}</td>
                        <td>{{ $serviceReport->service_hours }} hrs.</td>
                        <td>{{ $serviceReport->service_extras }}</td>
                        <td>{{ $serviceReport->duration_travel }}</td>
                        <td>{{ \Carbon\Carbon::parse($serviceReport->date_service)->format('d/m/Y') }}</td> 
                        <td >{{ $serviceReport->employee->name }} {{ $serviceReport->employee->last_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <h2 style="text-align:center;">{{ __('Elements used') }}</h2>
    
    <b><legend>{{ __('Materials')}}</legend></b>
    <br><br>
    <div>
        <table id="customers2">
            <thead>
               <tr>
                    <th>{{ __('Key')}}</th>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($materialUseds as $materialUsed)
                    <tr>
                        <td>{{ $materialUsed->material->key }}</td>
                        <td>{{ $materialUsed->material->name }}</td>
                        <td>{{ $materialUsed->quantity }}</td>
                        <td>{{ $materialUsed->material->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Tools')}}</legend></b>
    <br><br>
    <div>
        <table id=customers2>
            <thead>
                <tr>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Key')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toolUseds as $toolUsed)
                    <tr>
                        <td>{{ $toolUsed->tool->name }}</td>
                        <td>{{ $toolUsed->tool->key }}</td>
                        <td>{{ $toolUsed->quantity }}</td>
                        <td>{{ $toolUsed->tool->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <div>
            <p></p>
            @foreach($activity2 as $activity)
                <div>
                    <div>
                        <div>
                            <h1 style="text-align:center;">{{ __('Activities implemented')}}</h1>
                            <b><legend>{{ __('Activities implemented')}}:</legend></b> <br><br>
                                           
                                {{ $activity->description_task }}
                                <br><br>
                        </div>
                    <div>
                        <b><legend>{{ __('Evidence') }}: </legend></b>
                        <br><br>
                            <table id="customers4">
                                <tr>
                                    <td>
                                        <h3>{{ __('Before')}}:</h3>
                                            <div>
                                                <img src="{{ asset('app/public').'/'.$activity->previous_evidence }}" width="150" height="150" alt="">
                                            </div>
                                    </td>
                                    <td>
                                        <h3>{{ __('After') }}:</h3>
                                        <div>
                                            <img src="{{ asset('app/public').'/'.$activity->subsequent_evidence }}" width="150" height="150" alt="">
                                        </div>
                                    </td>
                                    <br>
                                </tr>
                            </table>
                    </div>
                        
                    <div>
                        <b><legend>{{ __('Signature') }}:</legend></b><br><br>
                            <img src="{{  $activity->signature_evidence }}" width="100%" height="250" alt="">
                    </div>
                    <div>
                        <table id="customers4">
                            <tr>
                                <td w>
                                    <div>
                                        <legend style="text-align:center">{{ __('Executor')}}: </legend><br>
                                        {{ $activity->employee->name }} <br> {{ $activity->employee->last_name }}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <legend>{{ __('Contact')}}:</legend><br>
                                        {{ $activity->contact->name }} {{ $activity->contact->last_name }}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>