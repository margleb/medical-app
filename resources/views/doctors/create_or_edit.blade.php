<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($doctor) ? 'Редактировать доктора' : 'Добавить доктора' }}</title>
</head>
<body>
<h1>{{ isset($doctor) ? 'Редактировать доктора' : 'Добавить доктора' }}</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($doctor) ? route('doctors.update', $doctor) : route('doctors.store') }}" method="POST">
    @csrf
    @if(isset($doctor))
        @method('PUT')
    @endif

    <div>
        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name', $doctor->name ?? '') }}" required>
    </div>

    <div>
        <label>Специальность:</label>
        <select name="specialty" required>
            @foreach ($specialties as $specialty)
                <option value="{{ $specialty }}"
                    {{ old('specialty', isset($doctor) ? $doctor->specialty : '') == $specialty ? 'selected' : '' }}>
                    {{ $specialty }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">{{ isset($doctor) ? 'Обновить' : 'Добавить' }}</button>
</form>

<a href="{{ route('doctors.index') }}">Обратно к списку</a>
</body>
</html>
