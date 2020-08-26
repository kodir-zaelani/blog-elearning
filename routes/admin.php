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
        Route::resource('/courselevelclass', 'CourselevelclassController');
        
        //Tool Class
        Route::resource('/tool', 'ToolController');
        
        //Section Class
        Route::resource('/section', 'SectionController');
       
        //Lesson Class
        Route::resource('/lesson', 'LessonController');
        
        //Lessoncomplete Class
        Route::resource('/lessoncomplete', 'LessoncompleteController');

        //Todotask Class
        Route::resource('/todotask', 'TodotaskController');

        //Room
        Route::resource('/room', 'RoomController');
        
        //Seting
        Route::resource('/setting', 'SettingController');
        
        //Participant
        Route::resource('/participant', 'ParticipantController');
        
        //Participant
        Route::get('/participantevent', 'ParticipantController@event')->name('participant.event');

        // Route::get('/lesson/levelclass', 'LessonController@levelclass')->name('lesson.levelclass');
        
