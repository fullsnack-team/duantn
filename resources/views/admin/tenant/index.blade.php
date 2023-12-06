@extends('layouts.admin')
@section('title','Danh sách cửa hàng')
@section('content')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-business_field-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Tìm kiếm"/>
                </div>
                <!--end::Search-->

            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                    <!--begin::Hide default export buttons-->
                    <div id="kt_datatable_business_field_buttons" class="d-none"></div>
                    <!--end::Hide default export buttons-->
                    <!--end::Export-->
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_business_field">
                        <i class="ki-duotone ki-plus fs-2"></i>Thêm Chi Nhánh
                    </button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <!--end::Modal - New Card-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_business_field" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_business_field_header">
                                <!--begin::Modal title-->
                                <h2 class="modal-header_title fw-bold">Thêm Tenant</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                     data-kt-business_field-modal-action="close">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body px-5 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_business_field_form" class="form" action="#">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                         id="kt_modal_add_business_field_scroll" data-kt-scroll="true"
                                         data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                         data-kt-scroll-dependencies="#kt_modal_add_business_field_header"
                                         data-kt-scroll-wrappers="#kt_modal_add_business_field_scroll"
                                         data-kt-scroll-offset="300px">
                                        @csrf
                                        <div class="select-user" style="display: block">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Tên cửa hàng</label>
                                                <input type="text" name="business_name"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Tên cửa hàng" value=""/>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Địa chỉ</label>
                                                <input type="text" name="address"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Địa chỉ" value=""/>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Tên miền(Viết liền không
                                                    dấu)</label>
                                                <input type="text" name="name_tenant"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Tên Tenant" value=""/>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Lựa Chọn User</label>
                                                <select class="form-select mb-2" name="user_id"
                                                        data-control="select2"
                                                        data-hide-search="true" data-placeholder="Chọn">
                                                    <option></option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Lựa Chọn Lĩnh Vưc Kinh
                                                    Doanh</label>
                                                <select class="form-select mb-2" name="business_field"
                                                        data-control="select2"
                                                        data-hide-search="true" data-placeholder="Chọn">
                                                    <option></option>
                                                    @foreach($businessField as $bf)
                                                        <option value="{{$bf->id}}">{{$bf->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Lựa Chọn Gói Dịch
                                                    Vụ</label>
                                                <select class="form-select mb-2" name="pricing_id"
                                                        data-control="select2"
                                                        data-hide-search="true" data-placeholder="Chọn">
                                                    <option></option>
                                                    @foreach($pricing as $price)
                                                        <option value="{{$price->id}}">{{$price->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{--                                            <div class="fv-row mb-7">--}}
                                            {{--                                                <label class="required fw-semibold fs-6 mb-2">Chọn ngày hết hạn</label>--}}
                                            {{--                                                <select class="form-select mb-2" name="due_at" data-control="select2"--}}
                                            {{--                                                        data-hide-search="true" data-placeholder="Chọn"--}}
                                            {{--                                                        id="kt_ecommerce_add_product_status_select">--}}
                                            {{--                                                    <option hidden=""></option>--}}
                                            {{--                                                    <option value="14">Free (14 ngày)</option>--}}
                                            {{--                                                    <option value="365">1 Năm</option>--}}
                                            {{--                                                    <option value="730">2 Năm</option>--}}
                                            {{--                                                    <option value="1095">3 Năm</option>--}}
                                            {{--                                                </select>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-10">

                                        <button type="reset" class="btn btn-light me-3"
                                                data-kt-business_field-modal-action="cancel">Huỷ
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-submit"
                                                data-kt-business_field-modal-action="submit">
                                            <span class="indicator-label">Lưu</span>
                                            <span class="indicator-progress">Vui lòng đợi...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>

                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_business_field">
                <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Tên cửa hàng</th>
                    <th class="min-w-125px">Tên miền</th>
                    <th class="min-w-125px">Địa chỉ</th>
                    <th class="min-w-125px">Tên User</th>
                    <th class="min-w-125px">Lĩnh Vực Kinh Doanh</th>
                    <th class="min-w-125px">Trạng Thái</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                @foreach($tenants as $tenant)
                    <tr data-id="{{$tenant->id}}">
                        <td>{{$tenant->business_name}}</td>
                        <td>{{$tenant->name}}</td>
                        <td>{{$tenant->address }}</td>
                        {{--                        <td>{{$tenant->database}}</td>--}}
                        <td>{{$tenant->user->name}}</td>
                        <td>{{$tenant->business_field->name}}</td>
                        <td class="{{$tenant->status == 1? 'text-success': 'text-danger'}}">{{$tenant->status == 1? 'Kích hoạt': 'Khum kích hoạt'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--begin::Page loading(append to body)-->
    <div class="page-loader flex-column bg-dark bg-opacity-25">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5">Đang tải...</span>
    </div>
    <!--end::Page loading-->
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{asset('assets/js/custom/apps/business-fields/list/table.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/business-fields/list/export-business_field.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/business-fields/list/add.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#hidden-user").hide()
            $("#add-user").click(function () {
                $("#add-user").hide()
                $(".show-add-user").show()
                $("#hidden-user").show()
                $(".select-user").hide()

            })
            $("#hidden-user").click(function () {
                $("#hidden-user").hide()
                $("#add-user").show()
                $(".select-user").show()
                $(".show-add-user").hide()
            })
            $('#kt_modal_add_business_field').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                let business_field_id = button.data('id')
                let business_name = $('#kt_modal_add_business_field_form input[business_name="name"]')
                let address = $('#kt_modal_add_business_field_form input[address="name"]')
                let name = $('#kt_modal_add_business_field_form input[name="name"]')
                let code = $('#kt_modal_add_business_field_form input[name="code"]')
                let detail = $('#kt_modal_add_business_field_form input[name="detail"]')
                if (business_field_id) {
                    KTApp.showPageLoading();
                    $.ajax({
                        url: '{{route('admin.bf.show')}}',
                        type: 'GET',
                        data: {id: business_field_id},
                        success: function (data) {
                            KTApp.hidePageLoading();
                            $('#kt_modal_add_business_field_header .modal-header_title').text('Cập nhật ngành hàng')
                            $('#kt_modal_add_business_field_form').append('<input type="hidden" name="id" value="' + data.payload.id + '">')
                            name.val(data.payload.name)
                            code.val(data.payload.code)
                            detail.val(data.payload.detail)
                        }
                    })
                } else {
                    $('#kt_modal_add_business_field_form input[name="id"]').val('')
                    $('#kt_modal_add_business_field_header .modal-header_title').text('Thêm mới ngành hàng')
                    name.val('')
                    code.val('')
                    detail.val('')
                }
            })

        })
    </script>
@endpush
