<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ Lang::get("main_side_tr.Dashbaord") }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url("/dash") }}">Dashboard 01</a> </li>

                        </ul>
                    </li>
                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ lang::get("main_side_tr.grades") }} </li> --}}
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#grades">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("main_side_tr.grade_section") }}</span>
                            </div>

                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="grades" class="collapse" data-parent="#sidebarnav_2">
                            <li>  <a href="{{ url("grade") }}">{{ lang::get("main_side_tr.grade_section") }}</a></li>

                        </ul>
                    </li>
                    {{--  --}}
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#classes">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("classes.title_page") }}</span>
                            </div>

                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes" class="collapse" data-parent="#sidebarnav_2">
                            <li>  <a href="{{ url("classes") }}">{{ lang::get("classes.List_classes") }}</a></li>

                        </ul>
                    </li>
                    {{--  --}}
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#sections">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("Sections_trans.title_page") }}</span>
                            </div>

                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav_2">
                            <li>  <a href="{{ url("sections") }}">{{ lang::get("Sections_trans.title_page") }}</a></li>

                        </ul>
                    </li>
                    {{-- the parent section --}}
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#parents_modal">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("parents.parentTitle") }}</span>
                            </div>

                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents_modal" class="collapse" data-parent="#sidebarnav_2">
                            {{-- <li>
                                <a href="
                                {{url('parents')}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ lang::get("parents.parentTitle") }}</span></a>
                            </li> --}}
                            <li>
                                <a href="
                                {{url('addparents')}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ lang::get("parents.addparentTitle") }}</span></a>
                            </li>




                        </ul>
                    </li>
                    {{-- teachets --}}
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#teachets">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("Teachers.teachers") }}</span>
                            </div>

                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachets" class="collapse" data-parent="#sidebarnav_2">
                            {{-- <li>
                                <a href="
                                {{url('parents')}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ lang::get("parents.parentTitle") }}</span></a>
                            </li> --}}
                            <li>
                                <a href="
                                {{url('teachers')}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ lang::get("Teachers.teachers") }}</span></a>
                            </li>




                        </ul>
                    </li>
                    {{-- the student section --}}
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("students.students") }}</span>
                            </div>

                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav_2">
{{--                        student managements--}}
                            <li>
                                <a href="javascript:void(1);" data-toggle="collapse" data-target="#sub_students">
                                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("students.students") }}</span>
                                    </div>

                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="sub_students" class="collapse" data-parent="#sidebarnav_2">
                                    <li>
                                        <a href="{{ url("students") }}"><i class="fas fa-book-open"></i><span
                                                class="right-nav-text">{{ trans("main_trans.students") }}</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("students.create") }}"><i class="fas fa-book-open"></i><span
                                                class="right-nav-text">{{ trans("main_trans.add_student") }}</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("grad_students") }}"><i class="fas fa-book-open"></i><span
                                                class="right-nav-text">{{ trans("students.grad_students") }}</span></a>
                                    </li>
                                </ul>
                            </li>
{{--                            promotions options--}}
                            <li>
                                <a href="javascript:void(1);" data-toggle="collapse" data-target="#sub_promotion">
                                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("students.promotionsTitle") }}</span>
                                    </div>

                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="sub_promotion" class="collapse" data-parent="#sidebarnav_2">
                                    <li>
                                        <a href="{{ route("promotions.index") }}"><i class="fas fa-book-open"></i><span
                                                class="right-nav-text">{{ trans("students.promotions") }}</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("promotions.create") }}"><i class="fas fa-book-open"></i><span
                                                class="right-nav-text">{{ trans("students.managementPromotions") }}</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <!-- menu item calendar-->

                    <!-- menu item table -->

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
