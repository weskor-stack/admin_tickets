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
        <table id="customers3">
            <thead>
                <tr>
                    <b><legend>{{ __('Customer')}}:</legend></b>
                </tr>
            </thead>
            <br>
                <tr>
                    <th></th>
                    <th>
                        <b>{{ __('Name')}}:</b> {{ $serviceOrder->ticket->customer->name }}<br>
                        <b>{{ __('Contact')}}:</b> {{ $serviceOrder->ticket->contact->name }}<br>
                        <b>{{ __('Contacts phone')}}:</b> {{ $serviceOrder->ticket->contact->phone }}<br>
                        <b>{{ __('Customers phone')}}:</b> {{ $serviceOrder->ticket->customer->phone }}<br>
                        <b>{{ __('Service Address')}}:</b> {{ $serviceOrder->ticket->customer->address }}<br>
                        <b>{{ __('Date')}}:</b> {{\Carbon\Carbon::parse($serviceOrder->date_order)->format('d/m/Y')}}                
                    </th>
                    <th>
                        
                    </th>
                    <td>
                        <b>{{ __('Ticket')}}:</b> {{ $serviceOrder->ticket->ticket_id }}<br>
                        <b>{{ __('Order')}}:</b> {{ $serviceOrder->service_order_id }}<br>
                        <b></b><br><br>
                        <b></b> 
                    </td>
                </tr>
        </table>
    </div>
    <br><br>
    <div>
        <h3>{{ __('Order of service')}}</h3>
        <table id="customers3">
           <tr>
                <td>
                    <b>* {{ __('Type of maintenance')}}: </b> {{$serviceOrder->typeMaintenance->name}}.
                </td>
                <td>
                    <b>* {{ __('Type of service')}}: </b> {{$serviceOrder->typeService->name}}.
                </td>
            </tr>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Materials')}}</legend></b>
    <br>
    <br>
    <div>
        <table id ="customers2">
            <thead>                           
                <tr>
                    <th>{{ __('Name')}}</th>
					<th>{{ __('Key')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materialAssigneds as $materialAssigned)                        
                    <tr>
                        <td>{{ $materialAssigned->material->name }}</td>
                        <td>{{ $materialAssigned->material->key }}</td>
                        <td>{{ $materialAssigned->quantity }}</td>
                        <td>{{ $materialAssigned->material->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Tools')}}</legend></b>
    <br>
    <br>
    <div>
        <table id="customers2">
            <thead>      
                <tr>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Key')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toolAssigneds as $toolAssigned)
                    <tr>
                        <td>{{ $toolAssigned->tool->name }}</td>
                        <td>{{ $toolAssigned->tool->key }}</td>
                        <td>{{ $toolAssigned->quantity }}</td>
                        <td>{{ $toolAssigned->tool->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Employees')}}</legend></b>
    <br>
    <br>
    <div>
        <table id="customers2">
            <thead>
                <tr>
                    <th>{{ __('ID Employees')}}</th>
                    <th>{{ __('Employee')}}</th>
                    <th>{{ __('Department')}}</th>
                    <th>{{ __('Supervisor')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employeeOrders as $employeeOrder)
                    <tr>
                        <td>{{ $employeeOrder->employee->employee_id }}</td>
                        <td>{{ $employeeOrder->employee->name }} {{ $employeeOrder->employee->last_name }}</td>
                        @foreach($supervisors as $supervisor)
                            @if($supervisor->employee_id == $employeeOrder->employee_id)
                                <td>{{$supervisor->department->name}}</td>
                                <td>{{$supervisor->employee->name}} {{$supervisor->employee->last_name}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>