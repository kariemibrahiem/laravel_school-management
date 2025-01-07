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
                    {{-- the student section --}}
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("students.students") }}</span>
                            </div>
                            
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav_2">
                            <li>
                                <a href="
                                {{-- {{route('student_exams.index')}} --}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">الامتحانات</span></a>
                            </li>
                    
                    
                            <!-- Settings-->
                            <li>
                                <a href="
                                {{-- {{route('profile-student.index')}} --}}
                                "><i class="fas fa-id-card-alt"></i><span
                                        class="right-nav-text">الملف الشخصي</span></a>
                            </li>
                         
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#teachers">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ lang::get("Teachers.teachers") }}</span>
                            </div>
                            
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers" class="collapse" data-parent="#sidebarnav_2">
                            <li>
                                <a href="{{('sections')}}"><i class="fas fa-chalkboard"></i><span
                                        class="right-nav-text">الاقسام</span></a>
                            </li>
                    
                            <!-- الطلاب-->
                            <li>
                                <a href="{{('student.index')}}"><i class="fas fa-user-graduate"></i><span
                                        class="right-nav-text">الطلاب</span></a>
                            </li>
                    
                            <!-- الاختبارات-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                                    <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                            class="right-nav-text">الاختبارات</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{('quizzes.index')}}">قائمة الاختبارات</a></li>
                                    <li><a href="#">قائمة الاسئلة</a></li>
                                </ul>
                    
                            </li>
                    
                    
                            <!-- Online classes-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                    <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{('online_zoom_classes.index')}}">حصص اونلاين مع زوم</a> </li>
                                </ul>
                            </li>
                    
                    
                    
                            <!-- sections-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu1">
                                    <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                            class="right-nav-text">التقارير</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="sections-menu1" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{('attendance.report')}}">تقرير الحضور والغياب</a></li>
                                    <li><a href="#">تقرير الامتحانات</a></li>
                                </ul>
                    
                            </li>
                    
                            <!-- الملف الشخصي-->
                            <li>
                                <a href="{{('profile.show')}}"><i class="fas fa-id-card-alt"></i><span
                                        class="right-nav-text">الملف الشخصي</span></a>
                            </li>
                    
                         
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(1);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Programname')}}</span>

                            </div>
                            
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav_2">
                            <li>
                                <a href="
                                {{-- {{route('sons.index')}} --}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">الابناء</span></a>
                            </li>
                    
                            <!-- تقرير الحضور والغياب-->
                            <li>
                                <a href="
                                {{-- {{route('student_exams.index')}} --}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">تقرير الحضور والغياب</span></a>
                            </li>
                    
                            <!-- تقرير المالية-->
                            <li>
                                <a href="
                                {{-- {{route('student_exams.index')}} --}}
                                "><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">تقرير المالية</span></a>
                            </li>
                    
                    
                            <!-- Settings-->
                            <li>
                                <a href="
                                {{-- {{route('profile-student.index')}} --}}
                                "><i class="fas fa-id-card-alt"></i><span
                                        class="right-nav-text">الملف الشخصي</span></a>
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
