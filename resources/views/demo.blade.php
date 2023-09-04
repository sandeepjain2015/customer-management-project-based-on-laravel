<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Demo page
    @if($name != '')
       name not empty
    @endif;
    <h2>{{$name}}</h2>
@if($id!='')
<h2>current id is{{$id}}</h2>
@else
{{"id is empty"}}
@endif;


   
    {{date('d-m-y')}}
    {!!$html!!}
{{--Check id for greatr than 4--}}
    @unless ($id >4)
        {{"Give  id greater than 4"}}
    @endunless

    @isset($id)
        {{"Welcom $id"}}
    @endisset
   @for($i=0;$i<10;$i++)
   @if($i==5)
   @continue
   @endif
   {{$i}}
   
   @endfor

 


      
</body>
</html>