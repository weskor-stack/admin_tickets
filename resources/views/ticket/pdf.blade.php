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
    <h2>Lista de Tickets</h2>
    
    <div>
        <table id="customers2">
            <thead>
                <tr>                                        
					<th>{{ __('Subject') }}</th>
					<th>{{ __('Problem') }}</th>
					<th>{{ __('Tickets date') }}</th>
					<th>{{ __('Tickets status') }}</th>
					<th>{{ __('Customer') }}</th>
					<th>{{ __('Contact') }}</th>
                    <th>{{ __('Priority') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                                           
						<td>{{ $ticket->subject }}</td>
						<td>{{ $ticket->problem }}</td>
						<td>{{\Carbon\Carbon::parse($ticket->date_ticket)->format('d/m/Y')}}</td>
						<td>{{ $ticket->ticketStatus->name }}</td>
						<td>{{ $ticket->customer->name }}</td>
						<td>{{ $ticket->contact->name }} {{ $ticket->contact->last_name }}</td>
                        <td>{{ $ticket->priority->name }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>