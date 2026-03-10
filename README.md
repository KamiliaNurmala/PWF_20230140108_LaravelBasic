## Pertemuan 1: Laravel Basic Setup
- Welcome Page dengan Nama, NIM, dan tombol navigasi
- Laravel Breeze (Login & Register)

### Screenshot UI
![Welcome Page](public/images/Welcome-Page.png)
![Login](public/images/Login.png)
![Register](public/images/Register.png)
![About Page](public/images/About.png)

## Pertemuan 2: Breeze & Routing
- Route `/about` dengan Controller
- Navigation link di Dashboard
- Biodata: Nama, NIM, Program Studi, Hobi

## Pertemuan 3: ERD, Model & Migration Database

### ERD Structure
- **User**: id, name, email, password
- **Product**: id, user_id, name, qty, price
- **Category**: id, product_id, name

### Model
![Product Model](public/images/product_models.png)
![Category Model](public/images/category_models.png)
![User Model](public/images/users_models.png)

### Migration
![Products Migration](public/images/products_migration.png)
![Categories Migration](public/images/categories_migration.png)

### Database (MySQL via XAMPP)
> Note: Beberapa tabel tambahan (cache, jobs, sessions, dll) adalah default Laravel yang otomatis dibuat oleh migration bawaan.

![Database List](public/images/db_list.png)
![Products Table](public/images/products_db.png)
![Categories Table](public/images/categories_db.png)
![Users Table](public/images/users_db.png)

---

**Nama:** Kamilia Nurmala Hayati  
**NIM:** 20230140108  
**Program Studi:** Teknologi Informasi