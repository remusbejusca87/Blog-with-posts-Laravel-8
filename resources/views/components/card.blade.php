{{-- declaring $attributes as class on div means that we have a default class for this div, but can also add more classes on the x-panel element  --}}
<div {{ $attributes(["class"=>"p-6 rounded-xl border border-gray-200"]) }}>
    {{ $slot }}
</div>
