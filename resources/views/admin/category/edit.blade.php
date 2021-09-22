@extends('layouts.admin_layout')

@section('title', 'Редактирование категорию')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать категорию : {{ $category->title }}</h1>
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
                <div class="card card-info">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 col-form-label text-lg pb-2">Название категории</label>
                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="inputEmail3" value="{{ $category->title }}" placeholder="Введите название категории" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Обновить</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
