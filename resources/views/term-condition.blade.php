@if($type == 1)
{{$data->terms_and_conditions}}
@elseif($type == '2')
{{$data->privacy_policy}}
@elseif($type == 3)
{{$data->about_us}}
@elseif($type == 4)
{{$data->legal}}
@elseif($type == 5)
{{$data->help}}
@elseif($type == 6)
{{$data->faqs}}
@endif