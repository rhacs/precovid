<?php

    namespace App;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable {
        use Notifiable;

        protected $fillable = [
            'name', 'dob', 'genero', 'pais', 'ciudad', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public function evaluaciones() {
            return $this->hasMany(Evaluacion::class);
        }

    }
