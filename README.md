# Multi-Tenant 

## Setup

```bash
git clone https://github.com/yourusername/multi-tenant-app.git
cd multi-tenant-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate


| Method | Endpoint                   | Description           |
| ------ | -------------------------- | --------------------- |
| POST   | /api/register              | Register user         |
| POST   | /api/login                 | Login user            |
| GET    | /api/user                   | get user            |
| POST   | /api/company/store         | Create company        |
| GET    | /api/companies             | List companies        |
| PUT    | /api/companies/{id}        | Update company        |
| DELETE | /api/companies/{id}        | Delete company        |
| POST   | /api/companies/switch/{id} | Switch active company |

