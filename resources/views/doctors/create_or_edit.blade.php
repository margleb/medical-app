<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($doctor) ? 'Редактировать доктора' : 'Добавить доктора' }}</title>
</head>
<body>
<h1>{{ isset($doctor) ? 'Редактировать доктора' : 'Добавить доктора' }}</h1>

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
        <input type="text" name="specialty" value="{{ old('specialty', $doctor->specialty ?? '') }}" required>
    </div>

    <button type="submit">{{ isset($doctor) ? 'Обновить' : 'Добавить' }}</button>
</form>

<a href="{{ route('doctors.index') }}">Обратно к списку</a>
</body>
</html>
