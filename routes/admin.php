<?php

use Illuminate\Support\Facades\Route;

        //dashboard
        Route::get('/dashboard', 'DashboardController@index');
        
        //permissions
        Route::resource('/permission', 'PermissionController', ['except' => ['show', 'edit', 'update', 'delete'] ]);

        //roles
        Route::resource('/role', 'RoleController', ['except' => ['show']]);

        //users
        Route::resource('/user', 'UserController', ['except' => ['show']]);

        //tags
        Route::resource('/tag', 'TagController', ['except' => 'show']);

        //categories
        Route::resource('/category', 'CategoryController', ['except' => 'show']);

        //posts
        Route::resource('/post', 'PostController', ['except' => 'show']);
        
        //event
        Route::resource('/event', 'EventController', ['except' => 'show']);
        
        //albums
        Route::resource('/album', 'AlbumController', ['except' => 'show']);

        //photo
        Route::resource('/photo', 'PhotoController', ['except' => ['show']]);
        
        //video
        Route::resource('/video', 'VideoController', ['except' => ['show']]);
        
        //slider
        Route::resource('/slider', 'SliderController', ['except' => ['show', 'create', 'edit', 'update']]);

        //Level Class
        Route::resource('/levelclass', 'LevelclassController');

        //Level Class
        Route::resource('/department', 'DepartmentController');
        
        //Instructur Class
        Route::resource('/classroom', 'ClassroomController');

        //Course Class
        Route::resource('/typecourse', 'TypecourseController');
       
        //Screenshoot Class
        // Route::resource('/courselevelclass', 'CourselevelclassController');
        
        //Tool Class
        // Route::resource('/tool', 'ToolController');
        
        //Section Class
        // Route::resource('/section', 'SectionController');
       
        //Lesson Class
        // Route::resource('/lesson', 'LessonController');
        
        //Lessoncomplete Class
        // Route::resource('/lessoncomplete', 'LessoncompleteController');

        //Todotask Class
        // Route::resource('/todotask', 'TodotaskController');

        //Room
        Route::resource('/room', 'RoomController');
        
        //Seting
        Route::resource('/setting', 'SettingController');
        
        //Participant
        Route::resource('/participant', 'ParticipantController', ['except' => ['show']]);
        
        //Participant
        Route::get('/participant/tampil', 'ParticipantController@tampil')->name('participant.tampil');
        Route::get('/participant/search', 'ParticipantController@search')->name('participant.search');
        Route::get('/participant/import', 'ParticipantController@import')->name('participant.import');
        Route::get('/participant/generate', 'ParticipantController@generate')->name('participant.generate');
        Route::post('/participant/importsave', 'ParticipantController@importSave')->name('participant.importsave');

        // Route::get('/student/levelclass/{levelclass}/classroom/{classroom}/import', 'Backend\StudentController@import')->name('student.levelclass.classroom.import');
        // Route::post('/student/levelclass/{levelclass}/classroom/{classroom}/import', 'Backend\StudentController@importSave')->name('student.levelclass.classroom.importSave');

        // Route::get('/lesson/levelclass', 'LessonController@levelclass')->name('lesson.levelclass');
        
