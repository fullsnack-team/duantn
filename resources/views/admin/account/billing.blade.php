@extends('layouts.admin')
@section('title','Billing')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Account Billing</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.home') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Account</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Filter menu-->
                        <div class="m-0">
                            <!--begin::Menu toggle-->
                            <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Filter</a>
                            <!--end::Menu toggle-->
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b7761f72421">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b7761f72421" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                        </div>
                        <!--end::Filter menu-->
                        <!--begin::Secondary button-->
                        <!--end::Secondary button-->
                        <!--begin::Primary button-->
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Navbar-->
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body pt-9 pb-0">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <!--begin: Pic-->
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{ asset('assets/media/avatars/300-1.jpg')}}" alt="image" />
                                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <!--begin::User-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max Smith</a>
                                                <a href="#">
                                                    <i class="ki-duotone ki-verify fs-1 text-primary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                            </div>
                                            <!--end::Name-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>Developer</a>
                                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>SF, Bay Area</a>
                                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                    <i class="ki-duotone ki-sms fs-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>max@kt.com</a>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Actions-->
                                        <div class="d-flex my-4">
                                            <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                                <i class="ki-duotone ki-check fs-3 d-none"></i>
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Follow</span>
                                                <!--end::Indicator label-->
                                                <!--begin::Indicator progress-->
                                                <span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                <!--end::Indicator progress-->
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
                                            <!--begin::Menu-->
                                            <div class="me-0">
                                                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                                </button>
                                                <!--begin::Menu 3-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                    <!--begin::Heading-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                    </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Create Invoice</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                            <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
																			<i class="ki-duotone ki-information fs-6">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																			</i>
																		</span></a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Generate Bill</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">Subscription</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Plans</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Billing</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Statements</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu separator-->
                                                            <div class="separator my-2"></div>
                                                            <!--end::Menu separator-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <div class="menu-content px-3">
                                                                    <!--begin::Switch-->
                                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                                        <!--begin::Input-->
                                                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                        <!--end::Input-->
                                                                        <!--end::Label-->
                                                                        <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                        <!--end::Label-->
                                                                    </label>
                                                                    <!--end::Switch-->
                                                                </div>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 my-1">
                                                        <a href="#" class="menu-link px-3">Settings</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 3-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap flex-stack">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column flex-grow-1 pe-8">
                                            <!--begin::Stats-->
                                            <div class="d-flex flex-wrap">
                                                <!--begin::Stat-->
                                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold fs-6 text-gray-400">Earnings</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">0</div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold fs-6 text-gray-400">Projects</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold fs-6 text-gray-400">Success Rate</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Progress-->
                                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                                <span class="fw-bold fs-6">50%</span>
                                            </div>
                                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <!--end::Progress-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                            <!--begin::Navs-->
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/overview.html">Overview</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/settings.html">Settings</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/security.html">Security</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/activity.html">Activity</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="../../demo1/dist/account/billing.html">Billing</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/statements.html">Statements</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/referrals.html">Referrals</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/api-keys.html">API Keys</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo1/dist/account/logs.html">Logs</a>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                            <!--begin::Navs-->
                        </div>
                    </div>
                    <!--end::Navbar-->
                    <!--begin::Billing Summary-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                        <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                                            <a href="#" class="fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add Payment Method</a>.</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-7">
                                    <!--begin::Heading-->
                                    <h3 class="mb-2">Active until Dec 09, 2023</h3>
                                    <p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">We will send you a notification upon Subscription expiration</p>
                                    <!--end::Heading-->
                                    <!--begin::Info-->
                                    <div class="fs-5 mb-2">
                                        <span class="text-gray-800 fw-bold me-1">$24.99</span>
                                        <span class="text-gray-600 fw-semibold">Per Month</span>
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Notice-->
                                    <div class="fs-6 text-gray-600 fw-semibold">Extended Pro Package. Up to 100 Agents & 25 Projects</div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-5">
                                    <!--begin::Heading-->
                                    <div class="d-flex text-muted fw-bold fs-5 mb-3">
                                        <span class="flex-grow-1 text-gray-800">Users</span>
                                        <span class="text-gray-800">86 of 100 Used</span>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Progress-->
                                    <div class="progress h-8px bg-light-primary mb-2">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Description-->
                                    <div class="fs-6 text-gray-600 fw-semibold mb-10">14 Users remaining until your plan requires update</div>
                                    <!--end::Description-->
                                    <!--begin::Action-->
                                    <div class="d-flex justify-content-end pb-0 px-0">
                                        <a href="#" class="btn btn-light btn-active-light-primary me-2" id="kt_account_billing_cancel_subscription_btn">Cancel Subscription</a>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</button>
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Billing Summary-->
                    <!--begin::Payment methods-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header card-header-stretch pb-0">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0">Payment Methods</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar m-0">
                                <!--begin::Tab nav-->
                                <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                    <!--begin::Tab item-->
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_billing_creditcard">Credit / Debit Card</a>
                                    </li>
                                    <!--end::Tab item-->
                                    <!--begin::Tab item-->
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_billing_paypal">Paypal</a>
                                    </li>
                                    <!--end::Tab item-->
                                </ul>
                                <!--end::Tab nav-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Tab content-->
                        <div id="kt_billing_payment_tab_content" class="card-body tab-content">
                            <!--begin::Tab panel-->
                            <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel">
                                <!--begin::Title-->
                                <h3 class="mb-5">My Cards</h3>
                                <!--end::Title-->
                                <!--begin::Row-->
                                <div class="row gx-9 gy-6">
                                    <!--begin::Col-->
                                    <div class="col-xl-6" data-kt-billing-element="card">
                                        <!--begin::Card-->
                                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column py-2">
                                                <!--begin::Owner-->
                                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">Marcus Morris
                                                    <span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
                                                <!--end::Owner-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Icon-->
                                                    <img src="{{ asset('assets/media/svg/card-logos/visa.svg')}}" alt="" class="me-4" />
                                                    <!--end::Icon-->
                                                    <!--begin::Details-->
                                                    <div>
                                                        <div class="fs-4 fw-bold">Visa **** 1679</div>
                                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at 09/24</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center py-2">
                                                <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
                                                    <!--begin::Indicator label-->
                                                    <span class="indicator-label">Delete</span>
                                                    <!--end::Indicator label-->
                                                    <!--begin::Indicator progress-->
                                                    <span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator progress-->
                                                </button>
                                                <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6" data-kt-billing-element="card">
                                        <!--begin::Card-->
                                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column py-2">
                                                <!--begin::Owner-->
                                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">Jacob Holder</div>
                                                <!--end::Owner-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Icon-->
                                                    <img src="{{ asset('assets/media/svg/card-logos/american-express.svg')}}" alt="" class="me-4" />
                                                    <!--end::Icon-->
                                                    <!--begin::Details-->
                                                    <div>
                                                        <div class="fs-4 fw-bold">Mastercard **** 2040</div>
                                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at 10/22</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center py-2">
                                                <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
                                                    <!--begin::Indicator label-->
                                                    <span class="indicator-label">Delete</span>
                                                    <!--end::Indicator label-->
                                                    <!--begin::Indicator progress-->
                                                    <span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator progress-->
                                                </button>
                                                <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6" data-kt-billing-element="card">
                                        <!--begin::Card-->
                                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column py-2">
                                                <!--begin::Owner-->
                                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">Jhon Larson</div>
                                                <!--end::Owner-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Icon-->
                                                    <img src="{{ asset('assets/media/svg/card-logos/mastercard.svg')}}" alt="" class="me-4" />
                                                    <!--end::Icon-->
                                                    <!--begin::Details-->
                                                    <div>
                                                        <div class="fs-4 fw-bold">Mastercard **** 1290</div>
                                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at 03/23</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center py-2">
                                                <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
                                                    <!--begin::Indicator label-->
                                                    <span class="indicator-label">Delete</span>
                                                    <!--end::Indicator label-->
                                                    <!--begin::Indicator progress-->
                                                    <span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator progress-->
                                                </button>
                                                <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6">
                                        <!--begin::Notice-->
                                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                <!--begin::Content-->
                                                <div class="mb-3 mb-md-0 fw-semibold">
                                                    <h4 class="text-gray-900 fw-bold">Important Note!</h4>
                                                    <div class="fs-6 text-gray-700 pe-7">Please carefully read
                                                        <a href="#" class="fw-bold me-1">Product Terms</a>adding
                                                        <br />your new payment card</div>
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Action-->
                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add Card</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div id="kt_billing_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_paypal_tab">
                                <!--begin::Title-->
                                <h3 class="mb-5">My Paypal</h3>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-gray-600 fs-6 fw-semibold mb-5">To use PayPal as your payment method, you will need to make pre-payments each month before your bill is due.</div>
                                <!--end::Description-->
                                <!--begin::Form-->
                                <form class="form">
                                    <!--begin::Input group-->
                                    <div class="mb-7 mw-350px">
                                        <select name="timezone" data-control="select2" data-placeholder="Select an option" data-hide-search="true" class="form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700">
                                            <option>Select an option</option>
                                            <option value="25">US $25.00</option>
                                            <option value="50">US $50.00</option>
                                            <option value="100">US $100.00</option>
                                            <option value="125">US $125.00</option>
                                            <option value="150">US $150.00</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <button type="submit" class="btn btn-primary">Pay with Paypal</button>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Payment methods-->
                    <!--begin::Billing Address-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3>Billing Address</h3>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Addresses-->
                            <div class="row gx-9 gy-6">
                                <!--begin::Col-->
                                <div class="col-xl-6" data-kt-billing-element="address">
                                    <!--begin::Address-->
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-5 fw-bold mb-5">Address 1
                                                <span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
                                            <div class="fs-6 fw-semibold text-gray-600">Ap #285-7193 Ullamcorper Avenue
                                                <br />Amesbury HI 93373
                                                <br />US</div>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center py-2">
                                            <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="address-delete">
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Delete</span>
                                                <!--end::Indicator label-->
                                                <!--begin::Indicator progress-->
                                                <span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                <!--end::Indicator progress-->
                                            </button>
                                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Edit</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Address-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6" data-kt-billing-element="address">
                                    <!--begin::Address-->
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-5 fw-bold mb-3">Address 2</div>
                                            <div class="fs-6 fw-semibold text-gray-600">Ap #285-7193 Ullamcorper Avenue
                                                <br />Amesbury HI 93373
                                                <br />US</div>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center py-2">
                                            <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="address-delete">
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Delete</span>
                                                <!--end::Indicator label-->
                                                <!--begin::Indicator progress-->
                                                <span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                <!--end::Indicator progress-->
                                            </button>
                                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Edit</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Address-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6" data-kt-billing-element="address">
                                    <!--begin::Address-->
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-5 fw-bold mb-3">Address 3</div>
                                            <div class="fs-6 fw-semibold text-gray-600">Ap #285-7193 Ullamcorper Avenue
                                                <br />Amesbury HI 93373
                                                <br />US</div>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center py-2">
                                            <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="address-delete">
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Delete</span>
                                                <!--end::Indicator label-->
                                                <!--begin::Indicator progress-->
                                                <span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                <!--end::Indicator progress-->
                                            </button>
                                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Edit</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Address-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed flex-stack h-xl-100 mb-10 p-6">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">This is a very important note!</h4>
                                                <div class="fs-6 text-gray-700 pe-7">Writing headlines for blog posts is much science and probably cool audience</div>
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">New Address</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Addresses-->
                            <!--begin::Tax info-->
                            <div class="mt-10">
                                <h3 class="mb-3">Tax Location</h3>
                                <div class="fw-semibold text-gray-600 fs-6">United States - 10% VAT
                                    <br />
                                    <a class="fw-bold" href="#">More Info</a></div>
                            </div>
                            <!--end::Tax info-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Billing Address-->
                    <!--begin::Billing History-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header card-header-stretch border-bottom border-gray-200">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="fw-bold m-0">Billing History</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar m-0">
                                <!--begin::Tab nav-->
                                <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                    <!--begin::Tab nav item-->
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_billing_6months_tab" class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Month</a>
                                    </li>
                                    <!--end::Tab nav item-->
                                    <!--begin::Tab nav item-->
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_billing_1year_tab" class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
                                    </li>
                                    <!--end::Tab nav item-->
                                    <!--begin::Tab nav item-->
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold" data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
                                    </li>
                                    <!--end::Tab nav item-->
                                </ul>
                                <!--end::Tab nav-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered align-middle gy-4 gs-9">
                                        <thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                        <tr>
                                            <td class="min-w-150px">Date</td>
                                            <td class="min-w-250px">Description</td>
                                            <td class="min-w-150px">Amount</td>
                                            <td class="min-w-150px">Invoice</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Nov 01, 2020</td>
                                            <td>
                                                <a href="#">Invoice for Ocrober 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Oct 08, 2020</td>
                                            <td>
                                                <a href="#">Invoice for September 2023</a>
                                            </td>
                                            <td>$98.03</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Aug 24, 2020</td>
                                            <td>Paypal</td>
                                            <td>$35.07</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Aug 01, 2020</td>
                                            <td>
                                                <a href="#">Invoice for July 2023</a>
                                            </td>
                                            <td>$142.80</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jul 01, 2020</td>
                                            <td>
                                                <a href="#">Invoice for June 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jun 17, 2020</td>
                                            <td>Paypal</td>
                                            <td>$523.09</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jun 01, 2020</td>
                                            <td>
                                                <a href="#">Invoice for May 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div id="kt_billing_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_year">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered align-middle gy-4 gs-9">
                                        <thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                        <tr>
                                            <td class="min-w-150px">Date</td>
                                            <td class="min-w-250px">Description</td>
                                            <td class="min-w-150px">Amount</td>
                                            <td class="min-w-150px">Invoice</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Dec 01, 2021</td>
                                            <td>
                                                <a href="#">Billing for Ocrober 2023</a>
                                            </td>
                                            <td>$250.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Oct 08, 2021</td>
                                            <td>
                                                <a href="#">Statements for September 2023</a>
                                            </td>
                                            <td>$98.03</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Aug 24, 2021</td>
                                            <td>Paypal</td>
                                            <td>$35.07</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Aug 01, 2021</td>
                                            <td>
                                                <a href="#">Invoice for July 2023</a>
                                            </td>
                                            <td>$142.80</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jul 01, 2021</td>
                                            <td>
                                                <a href="#">Statements for June 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jun 17, 2021</td>
                                            <td>Paypal</td>
                                            <td>$23.09</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_all">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered align-middle gy-4 gs-9">
                                        <thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                        <tr>
                                            <td class="min-w-150px">Date</td>
                                            <td class="min-w-250px">Description</td>
                                            <td class="min-w-150px">Amount</td>
                                            <td class="min-w-150px">Invoice</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Nov 01, 2021</td>
                                            <td>
                                                <a href="#">Billing for Ocrober 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Aug 10, 2021</td>
                                            <td>Paypal</td>
                                            <td>$35.07</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Aug 01, 2021</td>
                                            <td>
                                                <a href="#">Invoice for July 2023</a>
                                            </td>
                                            <td>$142.80</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jul 20, 2021</td>
                                            <td>
                                                <a href="#">Statements for June 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jun 17, 2021</td>
                                            <td>Paypal</td>
                                            <td>$23.09</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>Jun 01, 2021</td>
                                            <td>
                                                <a href="#">Invoice for May 2023</a>
                                            </td>
                                            <td>$123.79</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end::Billing Address-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2023&copy;</span>
                    <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
@push('modal')
    <!--begin::Modal - New Card-->
    <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Add New Card</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Name On Card</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
										<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
									</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                <!--end::Input-->
                                <!--begin::Card logos-->
                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                    <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                    <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                </div>
                                <!--end::Card logos-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Col-->
                            <div class="col-md-8 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                            <option></option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">CVV</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
											<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                    <!--end::Input-->
                                    <!--begin::CVV icon-->
                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                        <i class="ki-duotone ki-credit-cart fs-2hx">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <!--end::CVV icon-->
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="me-5">
                                <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                <span class="form-check-label fw-semibold text-muted">Save Card</span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <!--end::Modal - New Card-->
@endpush
@push('js')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('assets/js/custom/pages/user-profile/general.js')}}"></script>
    <script src="{{asset('assets/js/custom/account/billing/general.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/type.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/details.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/finance.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/complete.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/main.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/new-card.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/new-address.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endpush
