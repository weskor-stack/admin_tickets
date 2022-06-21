<!DOCTYPE html>
<html>
<head>
    <title>Dependent dropdown example</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
<body>
    <div>
        
        <div>
            {{ Form::label( __('Customer')) }} <br>
            <select class="form-select " id="customer">
                <option selected disabled>{{ __('Select customer')}}</option>
                @foreach ($countries as $country)
                <option value="{{ $country->customer_id }}">{{ $country->name }}</option>
                @endforeach
            </select>

            Texto seleccionado:<input type="text" id="customer_id" name="text1"><br>
        </div>
        <br>
        <div>
            {{ Form::label( __('Contact')) }} <br>
            Texto seleccionado:<input type="text" id="contact_id" name="text1"><br>
            <select class="form-select " id="contact"></select>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#customer').on('change', function () {
                var countryId = $(this).val();
                //document.getElementById('customer_id').value= countryId;
                $('#contact').html('');
                $.ajax({
                    url: "{{ route('getStates') }}?customer_id="+countryId,
                    type: 'get',
                    success: function (res) {
                        $('#contact').html("<option value=''>{{ __('Select contact')}}</option>");
                        $.each(res, function (key, value) {
                            $('#contact').append('<option value="' + value
                                .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                        });
                    }
                });
            });

            $('#contact').on('change', function () {
                var contactId = this.value;
                document.getElementById('contact_id').value= contactId;
                
            });
        });
    </script>
</body>
</html>