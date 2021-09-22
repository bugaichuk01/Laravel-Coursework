@extends('layouts.admin_layout')

@section('title', 'Редактирование статью')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать статью : {{ $post->title }}</h1>
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
                    <form class="form-horizontal" action="{{ route('post.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 col-form-label text-lg pb-2">Название статьи</label>
                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="inputEmail3" value="{{ $post->title }}" placeholder="Введите название категории" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Выберите категорию</label>
                                <select name="cat_id" class="custom-select" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $post->cat_id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="text" class="editor" id="" cols="30" rows="10">{{$post->text}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="feature_image">Изображение статьи</label>
                                <img src="/{{ $post->image }}" alt="" class="img-uploaded" style="display: block; width: 300px">
                                <input type="text" class="form-control" id="feature_image" name="image" id="feature_image" value="{{ $post->image }}" readonly>
                                <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Сохранить</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
