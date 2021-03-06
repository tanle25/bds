@extends('admin.main_layout')
@section('title')
    Widget
@endsection
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
<link rel="stylesheet" href="{{asset('template/menu-manage/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')}} ">
@endsection


@section('content')
@include('admin.partials.content_header', ['title' => 'Widgets'])
<div class="row px-4">
    <div class="card col-lg-4 p-0">
        <div class="card-header">
          <h3 class="card-title">Section trang chủ</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2" style="display: block;">
            <div>
                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">BDS nổi bật</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" class="widget-form">
                            <input type="hidden" name="widget_name" value="bds_noi_bat">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Tỉnh</label>
                                    <select class="form-control select2 select2-info" id="province" value="" name="province_code" data-dropdown-css-class="select2-info"
                                        style="width: 100%;">
                                        <option value="">Tỉnh / Thành Phố</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{$province->code}}"
                                            @isset ($widgets->where('name', 'bds_noi_bat')->first()->data_array->province_code)
                                            {{$widgets->where('name', 'bds_noi_bat')->first()->data_array->province_code == $province->code ? 'selected' : ''}}
                                            @endisset
                                            >
                                            {{$province->name_with_type}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="widget-name">Huyện</label>
                                <input type="hidden" name="districts">
                                <select class="form-control select2 select2-info" multiple id="districts" value="" name="districts[]" data-dropdown-css-class="select2-info"
                                style="width: 100%;">
                                    @foreach ($districts as $item)
                                    <option value="{{$item->code}}"
                                        @if (in_array($item->code, $current_district))
                                        selected
                                        @endif
                                    >{{$item->name_with_type}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget-control-actions">
                                <div class="float-left">
                                    <button type="button" class="btn btn-danger widget-control-delete">Delete</button>
                                </div>
                                <div class="float-right text-right">
                                    <button class="btn btn-primary widget_save">Save</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">Tại sao chọn chúng tôi </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form method="post" class="widget-form">
                          <input type="hidden" name="widget_name" value="home_why_choose">
                          @php
                              $section_why = $widgets->where('name', 'home_why_choose')->first()->data_array ?? null;
                          @endphp

                          <div class="form-group">
                              <label for="widget-name">Tiêu đề</label>
                              <input type="text" class="form-control" name="title"
                              value="{{$widgets->where('name', 'home_why_choose')->first()->data_array->title ?? ''}}">
                          </div>

                          <div class="form-group">
                              <label for="widget-name">Châm ngôn</label>
                              <textarea name="slogan" class="form-control" id="" cols="30" rows="5">{{$widgets->where('name', 'home_why_choose')->first()->data_array->slogan ?? ''}}</textarea>

                          </div>

                          <div class="form-group">
                              <label for="title">Item 1</label>
                              <div class="input-group">
                                  <input type="text" class="form-control item-menu" name="item[0][title]" id="title"
                                      placeholder="Nội dung" value="{{$section_why->item[0]->title ?? ''}}">
                                  <div class="input-group-append">
                                      <button type="button" role="iconpicker" data-icon="{{$section_why->item[0]->icon ?? ''}}" name="item[0][icon]" id="icon_0"
                                          class="btn btn-outline-secondary"></button>
                                  </div>
                              </div>
                              <input type="hidden" name="" class="item-menu">
                              <div class="input-group pt-2">
                                <textarea placeholder="Nội dung section" class="form-control" name="item[0][content]" value="{{$section_why->item[0]->content ?? ''}}" id="" cols="30" rows="5">{{$section_why->item[0]->content ?? ''}}</textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="title">Item 2</label>
                              <div class="input-group">
                                  <input type="text" class="form-control item-menu" value="{{$section_why->item[1]->title ?? ''}}" name="item[1][title]" id="title"
                                      placeholder="Nội dung">
                                  <div class="input-group-append">
                                      <button type="button" role="iconpicker" data-icon="{{$section_why->item[1]->icon ?? ''}}" name="item[1][icon]" id="icon_1"
                                          class="btn btn-outline-secondary"></button>
                                  </div>
                              </div>
                              <input type="hidden" name="" class="item-menu">
                              <div class="input-group pt-2">
                                <textarea placeholder="Nội dung section" class="form-control" name="item[1][content]" value="{{$section_why->item[1]->content ?? ''}}" id="" cols="30" rows="5">{{$section_why->item[1]->content ?? ''}}</textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="title">Item 3</label>
                              <div class="input-group">
                                  <input type="text" class="form-control item-menu" value="{{$section_why->item[2]->title ?? ''}}" name="item[2][title]"
                                      placeholder="Nội dung">
                                  <div class="input-group-append">
                                      <button type="button" role="iconpicker" data-icon="{{$section_why->item[2]->icon ?? ''}}"  name="item[2][icon]" id="icon_2"
                                          class="btn btn-outline-secondary"></button>
                                  </div>
                              </div>
                              <input type="hidden" name="" class="item-menu">
                              <div class="input-group pt-2">
                                <textarea placeholder="Nội dung section" class="form-control" name="item[2][content]" value="{{$section_why->item[2]->content ?? ''}}" id="" cols="30" rows="5">{{$section_why->item[2]->content ?? ''}}</textarea>
                              </div>
                          </div>
                          <div class="widget-control-actions">
                              <div class="float-left">
                                  <button type="button" class="btn btn-danger widget-control-delete">Delete</button>
                              </div>
                              <div class="float-right text-right">
                                  <button class="btn btn-primary widget_save">Save</button>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                      </form>
                    </div>
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Tin tức nổi bật</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" class="widget-form">
                            <input type="hidden" name="widget_name" value="tin_tuc_noi_bat">

                              <div class="form-group">
                                <label for="widget-name">Tin tức nổi bật</label>
                                <select class="form-control select2 select2-info" multiple id="post_categories" value="" name="post_categories[]" data-dropdown-css-class="select2-info"
                                style="width: 100%;">
                                    @foreach ($post_categories as $item)
                                    <option value="{{$item->id}}"
                                        @if (in_array($item->id, $current_post_categories))
                                        selected
                                        @endif
                                    >{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget-control-actions">
                                <div class="float-left">
                                    <button type="button" class="btn btn-danger widget-control-delete">Delete</button>
                                </div>
                                <div class="float-right text-right">
                                    <button class="btn btn-primary widget_save">Save</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dự án nổi bật</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" class="widget-form">
                            <input type="hidden" name="widget_name" value="du_an_noi_bat">
                              <div class="form-group">
                                <label for="widget-name">Dự án nổi bật</label>
                                <select class="form-control select2 select2-info" multiple id="projects" value="" name="projects[]" data-dropdown-css-class="select2-info"
                                style="width: 100%;">
                                    @foreach ($projects as $item)
                                    <option value="{{$item->id}}"
                                        @if (in_array($item->id, $current_projects))
                                        selected
                                        @endif
                                    >{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="widget-control-actions">
                                <div class="float-left">
                                    <button type="button" class="btn btn-danger widget-control-delete">Delete</button>
                                </div>
                                <div class="float-right text-right">
                                    <button class="btn btn-primary widget_save">Save</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script type="text/javascript" src="{{asset('template/menu-manage/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/menu-manage/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')}}"></script>
    <script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
    <script>
    </script>
    <script>
        function getDistricts(province_code) {
            url = '/get-district-of-province/' + province_code;
            return $.ajax({
                url: url,
                type: 'get',
            })
        }
        $('#province').on('change', function () {
            var province_code = $(this).val();
            var district_inputs = `<option value=""></option>`;
            getDistricts(province_code)
                .done(function (data) {
                    data.forEach(element => {
                        district_inputs += `<option value="${element.code}">${element.name_with_type}</option>`
                    });
                    $('#districts').html(district_inputs);
                });
        })

        $('#districts').on('change', function () {
            $("input[name=districts]").val($(this).val().join(','));
        });

        function storeData(data){
            $.ajax({
                url: "{{route('admin.widget.store')}}",
                data: data,
                success: function(data){
                    swalToast(data.msg);
                },
                error: function(data){

                }
            });
        }

        function deleteData(widgetName){
            $.ajax({
                url: "{{route('admin.widget.destroy')}}",
                data: {
                    widget_name: widgetName,
                },
                success: function(data){
                    swalToast(data.msg);
                    location.reload();
                },
                error: function(data){

                }
            });
        }

        $('.widget-form').on('submit', function(e){
            e.preventDefault();
            storeData($(this).serializeArray())
        })
        $('.widget-control-delete').on('click', function(e){
            e.preventDefault();
            var name = $(this).closest('.widget-form').find('[name="widget_name"]').val();
            deleteData(name);
        })

    </script>
@endsection
