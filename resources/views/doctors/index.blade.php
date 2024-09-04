<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доктора</title>
</head>
<body>
<h1>Доктора</h1>
<a href="{{ route('doctors.create') }}">Добавить доктора</a>

@if (session('success'))
    <p style="color: red;">{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Специальность</th>
        <th>Кол-во пациентов</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($doctors as $doctor)
        <tr>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->specialty }}</td>
            <td><a href="{{ route('doctors.show', $doctor) }}">{{ $doctor->patients->count() }}</a></td>
            <td>
                <a href="{{ route('doctors.edit', $doctor) }}">Edit</a>
                <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
