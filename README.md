# IDN Boarding School Student Admission

## About

Projek ini adalah mini-projek dengan fitur pendaftaran siswa baru sekolah IDN Boarding School.

## Installation

1. `composer install`
2. `npm install`
3. Copy .env then do `php artisan key:generate`
4. `php artisan migrate`
5. `php artisan serve`

## Made Of

- Laravel 10
- Livewire 2
- AlpineJS
- Bootstrap (AdminLTE)

## Tech Docs

### ERD

```mermaid
erDiagram
  BRANCH ||--o{ BRANCH_PROGRAM : has
  BRANCH {
    integer id PK
    string name
    datetime created_at
    datetime updated_at
  }
  PROGRAM ||--o{ BRANCH_PROGRAM : has
  PROGRAM {
    integer id PK
    string name
    datetime created_at
    datetime updated_at
  }
  REGISTRANT }o--|| BRANCH_PROGRAM : registers
  REGISTRANT {
    integer id PK
    integer user_id FK
    enum gender
    integer branch_id FK
    integer program_id FK
    string transfer_evidence
    datetime created_at
    datetime updated_at
  }
  USER ||--|| REGISTRANT : contains
  USER {
    integer id PK
    string name
    string email
    string email_verified_at
    string password
    string remember_token
    datetime created_at
    datetime updated_at
  }
  BRANCH_PROGRAM {
    integer id PK
    integer branch_id FK
    integer program_id FK
    integer quota
    datetime created_at
    datetime updated_at
  }
```
