
<table>
    <thead>
        <tr>
             <th width:20px;>no.</th>
           <th class="border-bottom-0"  > {{trans('transfile.title')}} &nbsp;&nbsp;</th>

                                                <th class="border-bottom-0"  >  اسم صاحب العهدة &nbsp;</th>
                                                <th class="border-bottom-0"  >  اصحاب عهدة التضامنية&nbsp;</th>

                                                <th class="border-bottom-0" > الادارة  &nbsp;</th>
                                                <th>نوع العهدة</th>
                                               <th>الكميه المستعارة الاصليه </th>
                                                <th>الكميه المستعارة الحالى</th>

<th>صاحب العهده المنقول له</th>
<th>صاحب العهدة المنقوله منه </th>
<th>العدد المنقول</th>

            <!-- Add more columns -->
        </tr>
    </thead>
    <tbody>
        @php $i=0; @endphp

        <tr>



											<td >{{$i=$i+1}}</td>

												<td>{{$results->value('title_arai') }}</td>
<td>{{  $results->value('name')}}</td>
<td>{{  $results->value('parteners')}}</td>
<td>{{  $results->value('departmentis')}}</td>
<td>{{  $results->value('ar_titles2')}}</td>
<td>{{  $results->value('number_itemsi')}}</td>

<td>{{  $results->value('number_currentis')}}</td>

            <!-- Add more fields -->
        </tr>

    </tbody>
</table>




