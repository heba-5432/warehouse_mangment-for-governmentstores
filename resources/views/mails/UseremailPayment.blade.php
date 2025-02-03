<x-mail::message>

<style>

h2,hr{
    color:black;text-align: center;direction:rtl;

}

</style>




                                        @foreach($content as $userrew)

<hr>
<h2>التاريخ:
{{$userrew->pay_date}}
                                            {{$userrew->name}}

												 {{$userrew->pay_title}}


{{$userrew->payment_value}}

<h2>القيمه بعد الخصومات:</h2>
{{$userrew->total_after_dis}}
<h2>القيمه  بعداضافه الحافز:</h2>
{{$userrew->total_after_reword}}
<h2>القيمه الاجمالى:</h2>
{{$userrew->total_after_add_dis}}
</hr>
<br>
@endforeach

<table></h1>
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,
{{ config('app.name') }}
</x-mail::message></h2>

