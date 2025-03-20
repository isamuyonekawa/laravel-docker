@props([
    'myAge'
])

<div {{ $attributes }}>
    <h1>{{ $name ?? '? name' }}</h1>
    <p>{{ $age ?? '? age' }} years old</p>
    <p>{{ $location ?? 'JP' }}</p>
</div>