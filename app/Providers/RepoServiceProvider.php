<?php

namespace App\Providers;

use App\Repository\FeeInvoiceRepositoryInterface;
use App\Repository\FeeRepositoryInterface;
use App\Repository\GraduatedRepositoryInterface;
use App\Repository\QuizzeRepositoryInterface;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind('App\Repository\TeacherRepositoryInterface', 'App\Repository\TeacherRepository');
         $this->app->bind('App\Repository\StudentRepositoryInterface', 'App\Repository\StudentRepository');
         $this->app->bind('App\Repository\PromotionRepositoryInterface', 'App\Repository\PromotionRepository');
         $this->app->bind('App\Repository\GraduatedRepositoryInterface', 'App\Repository\GraduatedRepository');
         $this->app->bind('App\Repository\FeeRepositoryInterface', 'App\Repository\FeeRepository');
         $this->app->bind('App\Repository\FeeInvoiceRepositoryInterface', 'App\Repository\FeeInvoiceRepository');
         $this->app->bind('App\Repository\ReceiptStudentsRepositoryInterface', 'App\Repository\ReceiptStudentsRepository');
         $this->app->bind('App\Repository\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
         $this->app->bind('App\Repository\PaymentRepositoryInterface', 'App\Repository\PaymentRepository');
         $this->app->bind('App\Repository\AttendanceRepositoryInterface', 'App\Repository\AttendanceRepository');
         $this->app->bind('App\Repository\SubjectRepositoryInterface', 'App\Repository\SubjectRepository');
         $this->app->bind('App\Repository\QuizzeRepositoryInterface', 'App\Repository\QuizzeRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
