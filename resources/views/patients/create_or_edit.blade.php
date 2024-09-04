<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($patient) ? 'Редактировать пациента' : 'Добавить пациента' }}</title>
</head>
<body>
<h1>{{ isset($patient) ? 'Редактировать пациента' : 'Добавить пациента' }}</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($patient) ? route('patients.update', $patient) : route('patients.store') }}" method="POST">
    @csrf
    @if(isset($patient))
        @method('PUT')
    @endif

    <div>
        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name', $patient->name ?? '') }}" required>
    </div>

    <div>
        <label>Возраст:</label>
        <input type="number" name="age" value="{{ old('age', $patient->age ?? '') }}" required>
    </div>

    <div>
        <label>Doctor:</label>
        <select name="doctor_id" required>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}"
                    {{ old('doctor_id', isset($patient) ? $patient->doctor_id : '') == $doctor->id ? 'selected' : '' }}>
                    {{ $doctor->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">{{ isset($patient) ? 'Обновить' : 'Добавить' }}</button>
</form>

<a href="{{ route('patients.index') }}">Обратно к списку</a>
</body>
</html>
