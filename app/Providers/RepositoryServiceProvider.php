<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    UserRepositoryInterface,
    DoctorRepositoryInterface,
    PatientRepositoryInterface,
    AppointmentRepositoryInterface,
    InvoiceRepositoryInterface,
    EmployeeRepositoryInterface,
    ClinicRepositoryInterface
};
use App\Repositories\Eloquent\{
    UserRepository,
    DoctorRepository,
    PatientRepository,
    AppointmentRepository,
    InvoiceRepository,
    EmployeeRepository,
    ClinicRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(ClinicRepositoryInterface::class, ClinicRepository::class);
    }
}
