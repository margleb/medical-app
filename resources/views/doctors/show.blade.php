<!-- resources/views/doctors/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пациенты доктора: {{ $doctor->name }}</title>
</head>
<body>
<h1>Пациенты доктора: {{ $doctor->name }}</h1>
<a href="{{ route('patients.create', ['doctor_id' => $doctor->id]) }}">Добавить пациента</a>

<table border="1">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Возраст</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->age }}</td>
            <td>
                <a href="{{ route('patients.edit', $patient) }}">Edit</a>
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

<a href="{{ route('doctors.index') }}">Обратно к списку докторов</a>
</body>
</html>
