# Database

🗄️ 1. Prinsip Desain Database (Biar Aman di Sidang)

1 user → banyak data turunan
- Tidak ada data ganda
- Semua relasi jelas FK-nya
- Tipe data standar Sqlite
- Mudah dijelaskan kenapa tabel ini ada



| Tabel Tujuan | Relasi                   |
| ------------ | ------------------------ |
| carts        | 1 user → 1 cart          |
| orders       | 1 user → banyak order    |
| bookmarks    | 1 user → banyak bookmark |

**Relasi**

books.category_id → categories.id
users.id → bookmarks.user_id
books.id → bookmarks.book_id
users.id → carts.user_id
users.id → orders.user_id
orders.id → order_items.order_id
books.id → order_items.book_id
