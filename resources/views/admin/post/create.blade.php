@extends('layouts.admin_layouts');

@section('title')
  Добавить статью
@endsection

@section('js')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
  $('.editor').summernote({
    lang: 'ru-RU',
    height: 160,
    toolbar: [
  ['style', ['style']],
  ['font', ['bold', 'underline', 'clear']],
  ['fontname', ['fontname']],
  ['color', ['color']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
],
popover: {
  image: [
    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
    ['float', ['floatLeft', 'floatRight', 'floatNone']],
    ['remove', ['removeMedia']]
  ],
  link: [
    ['link', ['linkDialogShow', 'unlink']]
  ],
  table: [
    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
  ],
  air: [
    ['color', ['color']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture']]
  ]
}

}).summernote('code');
});
</script>
@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить статью</h1>
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
                <!-- form start -->
                <form action="{{ route('post.store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Название</label>
                      <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите название статьи" required>
                    </div>
                    <div class="form-group">
                        <label>Выберите категорию</label>
                        <select name="cat_id" class="form-control">
                          @foreach($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <textarea name="text" class="editor"></textarea>
                      </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                  </div>
                </form>
              </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
