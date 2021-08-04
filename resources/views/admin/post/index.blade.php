@extends('layouts.admin_layouts');

@section('title')
  Все статьи
@endsection

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
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-disabled="alert" aria-hidden="true">х</button>
        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
      </div>
    @endif
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary">

          <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      <th>
                          Название
                      </th>
                      <th>
                          Описание
                      </th>
                      <th>
                          картинка
                      </th>
                      <th style="width: 30%">
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
                          {{ $post->title }}
                      </td>
                      <td style="max-wight: 300px">
                          {!! $post->text !!}
                      </td>
                      <td style="max-wight: 300px">
                          {!! $post->text !!}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Редактировать
                          </a>
                          <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                            style="display: inline-block;">
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

        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
