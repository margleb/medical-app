<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пациенты</title>
</head>
<body>
<h1>Пациенты</h1>
<a href="{{ route('patients.create') }}">Добавить пациента</a>

@if (session('success'))
    <p style="color: red;">{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Возраст</th>
        <th>Доктор</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->age }}</td>
            <td><a href="{{ route('doctors.show', $patient->doctor) }}">{{ $patient->doctor->name }}</a></td>
            <td>
                <a href="{{ route('patients.edit', $patient) }}">Редактировать</a>
                <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
