@props(['color','bgColor'=>'white'])

<div {{$attributes
        ->merge(['lang'=>'ka'])
        ->class("card card-text-$color card-bg-$bgColor")}}>
    <div class="card-header">{{ $title }}</div>
    @if ($slot ->isempty())
        <p>provide some content</p>
    @else
     {{$slot}}
    @endif
   
    <div class="card-footer"> {{ $footer }} </div>
</div>