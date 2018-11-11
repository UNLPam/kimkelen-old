<?php
// auto-generated by sfRoutingConfigHandler
// date: 2018/08/23 21:34:17
return array(
'dcWidgetFormSelectDoubleListFinderPropel' => new sfRoute('/dcWidgetFormSelectDoubleListFinderPropel', array (
  'module' => 'dcFormExtraPlugin',
  'action' => 'dcWidgetFormSelectDoubleListFinderPropel',
), array (
), array (
)),
'dcWidgetFormPropelChoiceDependant' => new sfRoute('/dcWidgetFormPropelChoiceDependant', array (
  'module' => 'dcFormExtraPlugin',
  'action' => 'dcWidgetFormPropelChoiceDependant',
), array (
), array (
)),
'dcWidgetAjaxDependenceChanged' => new sfRoute('/dcWidgetAjaxDependenceChanged', array (
  'module' => 'dcFormExtraPlugin',
  'action' => 'dcWidgetAjaxDependenceChanged',
), array (
), array (
)),
'pm_configuration' => new sfPropelRouteCollection(array (
  'model' => 'pmConfiguration',
  'module' => 'pmconfiguration',
  'prefix_path' => 'pmconfiguration',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'pm_configuration',
  'requirements' => 
  array (
  ),
)),
'pm_widget_form_propel_choice_or_create' => new sfRoute('/pm_widget_form_propel_choice_or_create', array (
  'module' => 'dc_ajax',
  'action' => 'getPropelChoices',
), array (
), array (
)),
'pm_widget_form_doctrine_choice_or_create' => new sfRoute('/pm_widget_form_doctrine_choice_or_create', array (
  'module' => 'dc_ajax',
  'action' => 'getDoctrineChoices',
), array (
), array (
)),
'dc_widget_form_ajax_dependence_changed' => new sfRoute('/dc_widget_form_ajax_dependence_changed', array (
  'module' => 'dc_ajax',
  'action' => 'dcWidgetFormAjaxDependenceChanged',
), array (
), array (
)),
'dc_widget_form_jquery_dependence_changed' => new sfRoute('/dc_widget_form_jquery_dependence_changed', array (
  'module' => 'dc_ajax',
  'action' => 'dcWidgetFormJQueryDependenceChanged',
), array (
), array (
)),
'pm_widget_form_propel_jquery_search' => new sfRoute('/pm_widget_form_propel_jquery_search', array (
  'module' => 'dc_ajax',
  'action' => 'pmWidgetFormPropelJQuerySearch',
), array (
), array (
)),
'dc_widget_form_activator' => new sfRoute('/dc_widget_form_activator', array (
  'module' => 'dc_ajax',
  'action' => 'dcWidgetFormActivator',
), array (
), array (
)),
'pm_widget_form_propel_input_by_code' => new sfRoute('/pm_widget_form_propel_input_by_code', array (
  'module' => 'dc_ajax',
  'action' => 'pmWidgetFormPropelInputByCode',
), array (
), array (
)),
'pm_widget_form_propel_jquery_tokeninput' => new sfRoute('/pm_widget_form_propel_jquery_tokeninput', array (
  'module' => 'dc_ajax',
  'action' => 'pmWidgetFormPropelJQueryTokeninput',
), array (
), array (
)),
'crJsTreePropel' => new sfRoute('/cr_jstree_propel', array (
  'module' => 'dc_ajax',
  'action' => 'crJsTreePropel',
), array (
), array (
)),
'crJsTreePropelMerge' => new sfRoute('/cr_jstree_propel_merge', array (
  'module' => 'dc_ajax',
  'action' => 'crJsTreePropelMerge',
), array (
), array (
)),
'crSelectableWidget' => new sfRoute('/cr_selectable_widget', array (
  'module' => 'dc_ajax',
  'action' => 'crSelectableWidget',
), array (
), array (
)),
'nc_change_log_detail' => new sfRoute('/change_log/show/:id', array (
  'module' => 'ncchangelogentry',
  'action' => 'show',
), array (
), array (
)),
'nc_change_log' => new sfRoute('/change_log/:class/:pk', array (
  'module' => 'ncchangelogentry',
  'action' => 'index',
), array (
), array (
)),
'disapproved_student' => new sfPropelRouteCollection(array (
  'model' => 'Student',
  'module' => 'disapproved_student',
  'prefix_path' => 'estadistica-de-alumnos-desaprobados',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'disapproved_student',
  'requirements' => 
  array (
  ),
)),
'deserter_student' => new sfPropelRouteCollection(array (
  'model' => 'Student',
  'module' => 'deserter_student',
  'prefix_path' => 'estadistica-de-alumnos-desertores',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'deserter_student',
  'requirements' => 
  array (
  ),
)),
'repeater_student' => new sfPropelRouteCollection(array (
  'model' => 'Student',
  'module' => 'repeater_student',
  'prefix_path' => 'estadistica-de-alumnos-repitentes',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'repeater_student',
  'requirements' => 
  array (
  ),
)),
'situation_r' => new sfPropelRouteCollection(array (
  'model' => 'Situation_R',
  'module' => 'situation_r',
  'prefix_path' => 'situation_r',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'situation_r',
  'requirements' => 
  array (
  ),
)),
'pathway_commission' => new sfPropelRouteCollection(array (
  'model' => 'Course',
  'module' => 'pathway_commission',
  'prefix_path' => 'pathway_commission',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'pathway_commission',
  'requirements' => 
  array (
  ),
)),
'pathway' => new sfPropelRouteCollection(array (
  'model' => 'Pathway',
  'module' => 'pathway',
  'prefix_path' => 'pathway',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'pathway',
  'requirements' => 
  array (
  ),
)),
'student_examination_repproved_subject' => new sfPropelRouteCollection(array (
  'model' => 'StudentExaminationRepprovedSubject',
  'module' => 'student_examination_repproved_subject',
  'prefix_path' => 'student_examination_repproved_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_examination_repproved_subject',
  'requirements' => 
  array (
  ),
)),
'add' => new sfRoute('/add', array (
  'module' => 'commission',
  'action' => 'add',
), array (
), array (
)),
'holiday' => new sfPropelRouteCollection(array (
  'model' => 'Holiday',
  'module' => 'holiday',
  'prefix_path' => 'holiday',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'holiday',
  'requirements' => 
  array (
  ),
)),
'student_disciplinary_sanction' => new sfPropelRouteCollection(array (
  'model' => 'StudentDisciplinarySanction',
  'module' => 'student_disciplinary_sanction',
  'prefix_path' => 'student_disciplinary_sanction',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_disciplinary_sanction',
  'requirements' => 
  array (
  ),
)),
'sanction' => new sfPropelRouteCollection(array (
  'model' => 'StudentDisciplinarySanction',
  'module' => 'sanction',
  'prefix_path' => 'sanction',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'sanction',
  'requirements' => 
  array (
  ),
)),
'move_students' => new sfRoute('move_students', array (
  'module' => 'division',
  'action' => 'moveStudents',
), array (
), array (
)),
'move_course_students' => new sfRoute('move_course_students', array (
  'module' => 'shared_course',
  'action' => 'moveStudents',
), array (
), array (
)),
'save_calificate_non_numerical_mark' => new sfRoute('course_student_mark/saveCalificateNonNumericalMark', array (
  'module' => 'course_student_mark',
  'action' => 'saveCalificateNonNumericalMark',
), array (
), array (
)),
'save_resolve_problematic_students' => new sfRoute('tentative_repproved_student/save', array (
  'module' => 'tentative_repproved_student',
  'action' => 'save',
), array (
), array (
)),
'rating_report' => new sfRoute('rating_report', array (
  'module' => 'rating_report',
  'action' => 'index',
), array (
), array (
)),
'course_subject_student_mark_change_log' => new sfRoute('/showMarkChangeLog', array (
  'module' => 'course_student_mark',
  'action' => 'showMarkChangeLog',
), array (
), array (
)),
'export_student_stats' => new sfRoute('/student_stats/ReportesEstudiantes.pdf', array (
  'module' => 'student_stats',
  'action' => 'studentReportsToPDF',
  'sf_format' => 'pdf',
), array (
), array (
)),
'set_student_filters' => new sfRoute('/set_student_filters', array (
  'module' => 'student_stats',
  'action' => 'setStudentFilters',
), array (
), array (
)),
'student_reports' => new sfRoute('/student_reports', array (
  'module' => 'student_stats',
  'action' => 'studentReports',
), array (
), array (
)),
'student_stats' => new sfPropelRouteCollection(array (
  'model' => 'Student',
  'module' => 'student_stats',
  'prefix_path' => 'student_stats',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_stats',
  'requirements' => 
  array (
  ),
)),
'resources' => new sfPropelRouteCollection(array (
  'model' => 'Resources',
  'module' => 'resources',
  'prefix_path' => 'resources',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'resources',
  'requirements' => 
  array (
  ),
)),
'state' => new sfPropelRouteCollection(array (
  'model' => 'State',
  'module' => 'state',
  'prefix_path' => 'state',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'state',
  'requirements' => 
  array (
  ),
)),
'print_table' => new sfRoute('/printTable', array (
  'module' => 'course_student_mark',
  'action' => 'printTable',
), array (
), array (
)),
'print_pathway_marks' => new sfRoute('/printPathwayMarks', array (
  'module' => 'pathway_commission',
  'action' => 'printPathwayMarks',
), array (
), array (
)),
'division_show_courses' => new sfRoute('/showCourses', array (
  'module' => 'division',
  'action' => 'showCourses',
), array (
), array (
)),
'division_show_students' => new sfRoute('/showStudents', array (
  'module' => 'division',
  'action' => 'showStudents',
), array (
), array (
)),
'course_show_students' => new sfRoute('/showCourseStudents', array (
  'module' => 'commission',
  'action' => 'showStudents',
), array (
), array (
)),
'delete_course_configuration' => new sfRoute('/delete_course_configuration', array (
  'module' => 'shared_course',
  'action' => 'deleteCourseSubjectConfiguration',
), array (
), array (
)),
'sanction_type' => new sfPropelRouteCollection(array (
  'model' => 'SanctionType',
  'module' => 'sanction_type',
  'prefix_path' => 'sanction_type',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'sanction_type',
  'requirements' => 
  array (
  ),
)),
'report_card' => new sfRoute('/report_card', array (
  'module' => 'report_card',
  'action' => 'index',
), array (
), array (
)),
'social_card' => new sfRoute('/student/:id/printSocialCard', array (
  'module' => 'student',
  'action' => 'printSocialCard',
  'sf_format' => 'pdf',
  'orientation' => 'portrait',
  'page-size' => 'Legal',
), array (
), array (
)),
'export_not_totally_approved_report_cards' => new sfRoute('/report_card/Boletines_adeudan_materias.pdf', array (
  'module' => 'report_card',
  'action' => 'subsetReportCardsToPDF',
  'sf_format' => 'pdf',
), array (
), array (
)),
'export_totally_approved_report_cards' => new sfRoute('/report_card/Boletines_aprobados.pdf', array (
  'module' => 'report_card',
  'action' => 'subsetReportCardsToPDF',
  'sf_format' => 'pdf',
  'all_approved' => true,
), array (
), array (
)),
'export_report_cards' => new sfRoute('/report_card/Boletines.pdf', array (
  'module' => 'report_card',
  'action' => 'reportCardsToPDF',
  'sf_format' => 'pdf',
), array (
), array (
)),
'student_free' => new sfPropelRouteCollection(array (
  'model' => 'StudentFree',
  'module' => 'student_free',
  'prefix_path' => 'student_free',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_free',
  'requirements' => 
  array (
  ),
)),
'career_school_year_period' => new sfPropelRouteCollection(array (
  'model' => 'CareerSchoolYearPeriod',
  'module' => 'career_school_year_period',
  'prefix_path' => 'career_school_year_period',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'career_school_year_period',
  'requirements' => 
  array (
  ),
)),
'student_career_school_year_conduct' => new sfPropelRouteCollection(array (
  'model' => 'StudentCareerSchoolYearConduct',
  'module' => 'student_career_school_year_conduct',
  'prefix_path' => 'student_career_school_year_conduct',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_career_school_year_conduct',
  'requirements' => 
  array (
  ),
)),
'search' => new sfRoute('/search', array (
  'module' => 'search',
  'action' => 'index',
), array (
), array (
)),
'study' => new sfPropelRouteCollection(array (
  'model' => 'Study',
  'module' => 'study',
  'prefix_path' => 'study',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'study',
  'requirements' => 
  array (
  ),
)),
'occupation_category' => new sfPropelRouteCollection(array (
  'model' => 'OccupationCategory',
  'module' => 'occupation_category',
  'prefix_path' => 'occupation_category',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'occupation_category',
  'requirements' => 
  array (
  ),
)),
'student_office' => new sfPropelRouteCollection(array (
  'model' => 'Personal',
  'module' => 'student_office',
  'prefix_path' => 'student_office',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_office',
  'requirements' => 
  array (
  ),
)),
'license' => new sfPropelRouteCollection(array (
  'model' => 'License',
  'module' => 'license',
  'prefix_path' => 'license',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'license',
  'requirements' => 
  array (
  ),
)),
'license_type' => new sfPropelRouteCollection(array (
  'model' => 'LicenseType',
  'module' => 'license_type',
  'prefix_path' => 'license_type',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'license_type',
  'requirements' => 
  array (
  ),
)),
'head_personal' => new sfPropelRouteCollection(array (
  'model' => 'Personal',
  'module' => 'head_personal',
  'prefix_path' => 'head_personal',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'head_personal',
  'requirements' => 
  array (
  ),
)),
'shared_course_subject' => new sfPropelRouteCollection(array (
  'model' => 'CourseSubject',
  'module' => 'shared_course_subject',
  'prefix_path' => 'shared_course_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'shared_course_subject',
  'requirements' => 
  array (
  ),
)),
'disciplinary_sanction_type' => new sfPropelRouteCollection(array (
  'model' => 'DisciplinarySanctionType',
  'module' => 'disciplinary_sanction_type',
  'prefix_path' => 'disciplinary_sanction_type',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'disciplinary_sanction_type',
  'requirements' => 
  array (
  ),
)),
'absence_type' => new sfPropelRouteCollection(array (
  'model' => 'AbsenceType',
  'module' => 'absence_type',
  'prefix_path' => 'absence_type',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'absence_type',
  'requirements' => 
  array (
  ),
)),
'student_reincorporation' => new sfPropelRouteCollection(array (
  'model' => 'StudentReincorporation',
  'module' => 'student_reincorporation',
  'prefix_path' => 'student_reincorporation',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student_reincorporation',
  'requirements' => 
  array (
  ),
)),
'attendance_justification_justificate' => new sfRoute('/justificacion-de-asistencia/justificar', array (
  'module' => 'attendance_justification',
  'action' => 'justificate',
), array (
), array (
)),
'attendance_justification' => new sfRoute('/justificacion-de-asistencia', array (
  'module' => 'attendance_justification',
  'action' => 'index',
), array (
), array (
)),
'justification_type' => new sfPropelRouteCollection(array (
  'model' => 'JustificationType',
  'module' => 'justification_type',
  'prefix_path' => 'justification_type',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'justification_type',
  'requirements' => 
  array (
  ),
)),
'commission' => new sfPropelRouteCollection(array (
  'model' => 'Course',
  'module' => 'commission',
  'prefix_path' => 'commission',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'commission',
  'requirements' => 
  array (
  ),
)),
'tutor_type' => new sfPropelRouteCollection(array (
  'model' => 'TutorType',
  'module' => 'tutor_type',
  'prefix_path' => 'tutor_type',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'tutor_type',
  'requirements' => 
  array (
  ),
)),
'health_coverage' => new sfPropelRouteCollection(array (
  'model' => 'HealthCoverage',
  'module' => 'health_coverage',
  'prefix_path' => 'health_coverage',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'health_coverage',
  'requirements' => 
  array (
  ),
)),
'student_attendance_subject' => new sfRoute('/inasistencias-por-materia', array (
  'module' => 'student_attendance',
  'action' => 'SelectValuesForAttendanceSubject',
), array (
), array (
)),
'student_attendance_day' => new sfRoute('/inasistencias-por-dia', array (
  'module' => 'student_attendance',
  'action' => 'SelectValuesForAttendanceDay',
), array (
), array (
)),
'save_student_attendance' => new sfRoute('/student_attendance/SaveStudentAttendance', array (
  'module' => 'student_attendance',
  'action' => 'SaveStudentAttendance',
), array (
), array (
)),
'tag' => new sfPropelRouteCollection(array (
  'model' => 'Tag',
  'module' => 'tag',
  'prefix_path' => 'tag',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'tag',
  'requirements' => 
  array (
  ),
)),
'sub_orientation' => new sfPropelRouteCollection(array (
  'model' => 'SubOrientation',
  'module' => 'sub_orientation',
  'prefix_path' => 'sub_orientation',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'sub_orientation',
  'requirements' => 
  array (
  ),
)),
'tutor' => new sfPropelRouteCollection(array (
  'model' => 'Tutor',
  'module' => 'tutor',
  'prefix_path' => 'tutor',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'tutor',
  'requirements' => 
  array (
  ),
)),
'equivalence' => new sfPropelRouteCollection(array (
  'model' => 'CareerSchoolYear',
  'module' => 'equivalence',
  'prefix_path' => 'equivalence',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'equivalence',
  'requirements' => 
  array (
  ),
)),
'examination_repproved_subject' => new sfPropelRouteCollection(array (
  'model' => 'ExaminationRepprovedSubject',
  'module' => 'examination_repproved_subject',
  'prefix_path' => 'examination_repproved_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'examination_repproved_subject',
  'requirements' => 
  array (
  ),
)),
'examination_repproved' => new sfPropelRouteCollection(array (
  'model' => 'ExaminationRepproved',
  'module' => 'examination_repproved',
  'prefix_path' => 'examination_repproved',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'examination_repproved',
  'requirements' => 
  array (
  ),
)),
'course_subject_student_examination' => new sfPropelRouteCollection(array (
  'model' => 'CourseSubjectStudentExamination',
  'module' => 'course_subject_student_examination',
  'prefix_path' => 'course_subject_student_examination',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'course_subject_student_examination',
  'requirements' => 
  array (
  ),
)),
'examination_subject' => new sfPropelRouteCollection(array (
  'model' => 'ExaminationSubject',
  'module' => 'examination_subject',
  'prefix_path' => 'examination_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'examination_subject',
  'requirements' => 
  array (
  ),
)),
'manual_examination_subject' => new sfPropelRouteCollection(array (
  'model' => 'ExaminationSubject',
  'module' => 'manual_examination_subject',
  'prefix_path' => 'manual_examination_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'manual_examination_subject',
  'requirements' => 
  array (
  ),
)),
'examination' => new sfPropelRouteCollection(array (
  'model' => 'Examination',
  'module' => 'examination',
  'prefix_path' => 'examination',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'examination',
  'requirements' => 
  array (
  ),
)),
'manual_examination' => new sfPropelRouteCollection(array (
  'model' => 'Examination',
  'module' => 'manual_examination',
  'prefix_path' => 'manual_examination',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'manual_examination',
  'requirements' => 
  array (
  ),
)),
'classroom' => new sfPropelRouteCollection(array (
  'model' => 'Classroom',
  'module' => 'classroom',
  'prefix_path' => 'classroom',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'classroom',
  'requirements' => 
  array (
  ),
)),
'division_course' => new sfPropelRouteCollection(array (
  'model' => 'Course',
  'module' => 'division_course',
  'prefix_path' => 'division_course',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'division_course',
  'requirements' => 
  array (
  ),
)),
'shared_student' => new sfPropelRouteCollection(array (
  'model' => 'Student',
  'module' => 'shared_student',
  'prefix_path' => 'shared_student',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'shared_student',
  'requirements' => 
  array (
  ),
)),
'student' => new sfPropelRouteCollection(array (
  'model' => 'Student',
  'module' => 'student',
  'prefix_path' => 'student',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'student',
  'requirements' => 
  array (
  ),
)),
'shift' => new sfPropelRouteCollection(array (
  'model' => 'Shift',
  'module' => 'shift',
  'prefix_path' => 'shift',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'shift',
  'requirements' => 
  array (
  ),
)),
'career_subject_option' => new sfPropelRouteCollection(array (
  'model' => 'CareerSubject',
  'module' => 'career_subject_option',
  'prefix_path' => 'career_subject_option',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'career_subject_option',
  'requirements' => 
  array (
  ),
)),
'optional_school_year' => new sfPropelRouteCollection(array (
  'model' => 'CareerSubjectSchoolYear',
  'module' => 'optional_school_year',
  'prefix_path' => 'optional_school_year',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'optional_school_year',
  'requirements' => 
  array (
  ),
)),
'career_subject_school_year' => new sfPropelRouteCollection(array (
  'model' => 'CareerSubjectSchoolYear',
  'module' => 'career_subject_school_year',
  'prefix_path' => 'career_subject_school_year',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'career_subject_school_year',
  'requirements' => 
  array (
  ),
)),
'career_school_year' => new sfPropelRouteCollection(array (
  'model' => 'CareerSchoolYear',
  'module' => 'career_school_year',
  'prefix_path' => 'career_school_year',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'career_school_year',
  'requirements' => 
  array (
  ),
)),
'orientation' => new sfPropelRouteCollection(array (
  'model' => 'Orientation',
  'module' => 'orientation',
  'prefix_path' => 'orientation',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'orientation',
  'requirements' => 
  array (
  ),
)),
'division_title' => new sfPropelRouteCollection(array (
  'model' => 'DivisionTitle',
  'module' => 'division_title',
  'prefix_path' => 'division_title',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'division_title',
  'requirements' => 
  array (
  ),
)),
'optional_career_subject' => new sfPropelRouteCollection(array (
  'model' => 'OptionalCareerSubject',
  'module' => 'optional_career_subject',
  'prefix_path' => 'optional_career_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'optional_career_subject',
  'requirements' => 
  array (
  ),
)),
'occupation' => new sfPropelRouteCollection(array (
  'model' => 'Occupation',
  'module' => 'occupation',
  'prefix_path' => 'ocupaciones',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'occupation',
  'requirements' => 
  array (
  ),
)),
'division' => new sfPropelRouteCollection(array (
  'model' => 'Division',
  'module' => 'division',
  'prefix_path' => 'division',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'division',
  'requirements' => 
  array (
  ),
)),
'create_course_division' => new sfRoute('/course/createCourseDivision/:career_subject_id', array (
  'module' => 'course',
  'action' => 'createCourseDivision',
), array (
  'career_subject_id' => '\\d+',
), array (
)),
'personal' => new sfPropelRouteCollection(array (
  'model' => 'Personal',
  'module' => 'personal',
  'prefix_path' => 'personal',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'personal',
  'requirements' => 
  array (
  ),
)),
'shared_course' => new sfPropelRouteCollection(array (
  'model' => 'Course',
  'module' => 'shared_course',
  'prefix_path' => 'shared_course',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'shared_course',
  'requirements' => 
  array (
  ),
)),
'course' => new sfPropelRouteCollection(array (
  'model' => 'Course',
  'module' => 'course',
  'prefix_path' => 'cursos',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'course',
  'requirements' => 
  array (
  ),
)),
'school_year' => new sfPropelRouteCollection(array (
  'model' => 'SchoolYear',
  'module' => 'schoolyear',
  'prefix_path' => 'anios-lectivos',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'school_year',
  'requirements' => 
  array (
  ),
)),
'address' => new sfPropelRouteCollection(array (
  'model' => 'Address',
  'module' => 'address',
  'prefix_path' => 'address',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'address',
  'requirements' => 
  array (
  ),
)),
'career_subject' => new sfPropelRouteCollection(array (
  'model' => 'CareerSubject',
  'module' => 'career_subject',
  'prefix_path' => 'career_subject',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'career_subject',
  'requirements' => 
  array (
  ),
)),
'career' => new sfPropelRouteCollection(array (
  'model' => 'Career',
  'module' => 'career',
  'prefix_path' => 'career',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'career',
  'requirements' => 
  array (
  ),
)),
'teacher' => new sfPropelRouteCollection(array (
  'model' => 'Teacher',
  'module' => 'teacher',
  'prefix_path' => 'teacher',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'teacher',
  'requirements' => 
  array (
  ),
)),
'change_school_year_attendance_date' => new sfRoute('/cambiar-fecha', array (
  'module' => 'division',
  'action' => 'changeDate',
), array (
), array (
)),
'divisionAttendanceDay' => new sfRoute('/asistencias-alumnos', array (
  'module' => 'division',
  'action' => 'attendanceSheet',
), array (
), array (
)),
'courseAttendanceCourseSubject' => new sfRoute('/asistencias-alumnos-materia', array (
  'module' => 'shared_course',
  'action' => 'attendanceSheet',
), array (
), array (
)),
'change_password' => new sfRoute('/cambiar-password', array (
  'module' => 'sfGuardChangePassword',
  'action' => 'index',
), array (
), array (
)),
'subject' => new sfPropelRouteCollection(array (
  'model' => 'Subject',
  'module' => 'subject',
  'prefix_path' => 'materias',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'subject',
  'requirements' => 
  array (
  ),
)),
'get_careers' => new sfRoute('/carreras-de-año-lectivo', array (
  'module' => 'subject',
  'action' => 'getCareers',
), array (
), array (
)),
'courses_for_school_year_career' => new sfRoute('/cursadas-de-año-lectivo-y-carrera', array (
  'module' => 'subject',
  'action' => 'coursesForSchoolYearCareer',
), array (
), array (
)),
'courses_for_subject' => new sfRoute('/historico-de-cursos', array (
  'module' => 'course',
  'action' => 'filter',
), array (
), array (
)),
'sf_guard_secure' => new sfRoute('/acceso-denegado', array (
  'module' => 'sfGuardAuth',
  'action' => 'secure',
), array (
), array (
)),
'sf_guard_signin' => new sfRoute('/login', array (
  'module' => 'sfGuardAuth',
  'action' => 'signin',
), array (
), array (
)),
'sf_guard_signout' => new sfRoute('/logout', array (
  'module' => 'sfGuardAuth',
  'action' => 'signout',
), array (
), array (
)),
'sf_guard_password' => new sfRoute('/request_password', array (
  'module' => 'sfGuardAuth',
  'action' => 'password',
), array (
), array (
)),
'manual_administracion' => new sfRoute('/manual_administracion', array (
  'module' => 'default',
  'action' => 'displayAdministrationManual',
), array (
), array (
)),
'homepage' => new sfRoute('/', array (
  'module' => 'mainBackend',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);
