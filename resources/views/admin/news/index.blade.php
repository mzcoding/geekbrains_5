@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Список новостей</h2>
        <br>
        <a href="{{ route('news.create') }}">Добавить новость</a>
        <br><br>
     <table class="table table-bordered">
         <thead>
         <tr>
             <th>#ID</th>
             <th>Категория</th>
             <th>Новость</th>
             <th>Дата добавления</th>
             <th>Управление</th>
         </tr>
         </thead>
         <tbody>
    @forelse($newsList as $news)
        <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->category_title }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ now()->format('d-m-Y H:i:s') }} </td>
            <td><a href="{{ route('news.edit', ['news' => $news->id]) }}">Ред.</a></td>
        </tr>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
         </tbody>
     </table>
    </div>
@stop
@push('js')
    <script type="text/javascript">
       // alert("Hello world");
    </script>
@endpush