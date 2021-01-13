@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 alert alert-danger']) }}>
    {{ $status }}
</div>
@endif
