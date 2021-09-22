@extends('layouts.admin_layout')

@section('title', 'Все статьи')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все статьи</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-12">
                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Таблица</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        ID
                                    </th>
                                    <th>
                                        Название статьи
                                    </th>
                                    <th>
                                        Категория
                                    </th>
                                    <th style="width: 50%">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->id }}
                                    </td>
                                    <td>
                                        <a>
                                            {{ $post->title }}
                                        </a>
                                        <br>
                                        <small>
                                            Created {{ $post->created_at }}
                                        </small>
                                    </td>
                                    <td>
                                        {{ $post->category->title }}
                                    </td>

                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('post.edit' , $post->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Редактировать
                                        </a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
