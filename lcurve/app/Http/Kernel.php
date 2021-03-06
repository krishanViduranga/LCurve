<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Localization::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'isAdmin' => \App\Http\Middleware\AdminMiddleware::class,
        'clearanceAnnouncement' => \App\Http\Middleware\ClearanceAnnouncementMiddleware::class,
        'clearanceGrade' => \App\Http\Middleware\ClearanceGradeMiddleware::class,
        'clearanceLesson' => \App\Http\Middleware\ClearanceLessonMiddleware::class,
        'clearanceClassRoom' => \App\Http\Middleware\ClearanceClassRoomMiddleware::class,
        'clearanceSocietyRoom' => \App\Http\Middleware\ClearanceSocietyMiddleware::class,
        'clearanceForum' => \App\Http\Middleware\ClearanceForumMiddleware::class,
        'clearanceSport' => \App\Http\Middleware\ClearanceSportMiddleware::class,
        'clearanceRole' => \App\Http\Middleware\ClearanceRoleMiddleware::class,
        'clearanceClassSubject' => \App\Http\Middleware\ClearanceClassSubjectMiddleware::class,
        'clearanceQuizzQuestion' => \App\Http\Middleware\ClearanceQuizzQuestionMiddleware::class,
        'clearanceQuizzQuestionOption' => \App\Http\Middleware\ClearanceQuizzQuestionOptionMiddleware::class,
        'clearanceQuizzTopicOption' => \App\Http\Middleware\ClearanceQuizzTopicMiddleware::class,
    ];
}
